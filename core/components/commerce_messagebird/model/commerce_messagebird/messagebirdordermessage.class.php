<?php

use modmore\Commerce\Admin\Widgets\Form\CheckboxField;
use modmore\Commerce\Admin\Widgets\Form\SelectField;
use modmore\Commerce\Admin\Widgets\Form\TextareaField;
use modmore\Commerce\Admin\Widgets\Form\Validation\Length;
use modmore\Commerce\Admin\Widgets\Form\Validation\Required;
use modmore\Commerce\Exceptions\ViewException;

/**
 * MessageBird extension for Commerce, allowing text messages to be sent.
 *
 * Copyright 2017 by Mark Hamstra <mark@modmore.com>
 *
 * This file is meant to be used with Commerce by modmore. A valid Commerce license is required.
 *
 * @package commerce_messagebird
 * @author Mark Hamstra <mark@modmore.com>
 * @license See core/components/commerce_messagebird/docs/license.txt
 */
class MessageBirdOrderMessage extends comOrderMessage
{
    /**
     * Send the SMS through MessageBird
     *
     * @return bool
     */
    public function send()
    {
        // Parse the message body through twig
        $placeholders = $this->getPlaceholders();
        try {
            $body = $this->commerce->view()->renderString($this->get('content'), $placeholders);
        } catch (ViewException $e) {
            $body = $e->getMessage();
        }

        // Get the recipient and do some basic filtering
        $recipient = $this->get('recipient');
        $recipient = preg_replace('/\D/', '', $recipient); // @todo improve the way phone numbers are filtered/validated

        // Grab the access key and make sure it's filled
        $accessKey = $this->commerce->getOption('commerce_messagebird.access_key');
        if (empty($accessKey)) {
            $this->adapter->log(1, 'Can\'t initiate MessageBird API, missing API key in commerce_messagebird.access_key setting.');
            return false;
        }

        // Create the client
        $messagebird = new \MessageBird\Client($accessKey);

        // Create the message
        $message = new \MessageBird\Objects\Message();
        $message->originator = $this->commerce->getOption('commerce_messagebird.originator');
        $message->recipients = [$recipient];
        $message->body = $body;
        $message->reference = $this->adapter->lexicon('commerce.order') . ' ' . $this->get('order') . ' / ' . $this->get('id');

        // Send it off to the API
        try {
            $sentMessage = $messagebird->messages->create($message);
        }
        catch (Exception $e) {
            $this->adapter->log(1, 'Error sending MessageBird SMS ' . $this->get('id') . ' - received exception ' . get_class($e) . ' with message ' . $e->getMessage() . ' for message ' . print_r($message, true));

            return false;
        }

        // Check for a message ID in the response, and store it along the message.
        $id = $sentMessage->getId();
        if (!empty($id)) {
            $this->setProperties([
                'messagebird_id' => $id,
                'sent_count' => $sentMessage->recipients->totalSentCount,
                'delivered_count' => $sentMessage->recipients->totalSentCount,
            ]);
            $this->save();
        }

        if ($sentMessage->recipients->totalSentCount === $sentMessage->recipients->totalCount) {
            return parent::send();
        }
        else {
            $this->adapter->log(1, 'Error sending MessageBird SMS ' . $this->get('id') . ' - expecting recipients.totalSentCount to be equal to totalCount: ' . print_r($sentMessage, true));
            return false;
        }
    }

    /**
     * Render the content for use in the message (pre)view
     *
     * @return string
     */
    public function getMessageContent()
    {
        $values = $this->getPlaceholders();
        $values['message'] = $this->toArray();
        try {
            $values['body'] = $this->commerce->view()->renderString($this->get('content'), $values);
        } catch (ViewException $e) {
            $values['body'] = $e->getMessage();
        }

        return $this->commerce->view()->render('messagebird/preview.twig', $values);
    }

    public function getModelFields()
    {
        $fields = [];

        // Populate a select field with the available phone numbers
        $options = [];
        $order = $this->adapter->getObject('comOrder', ['id' => $this->get('order')]);
        if ($order instanceof comOrder) {
            $billing = $order->getBillingAddress();
            if ($billing instanceof comOrderAddress) {
                $phone = $billing->get('phone');
                if (!empty($phone)) {
                    $options[] = [
                        'label' => $this->adapter->lexicon('commerce.billing_address') . ' - ' . $this->adapter->lexicon('commerce.address.phone') . ' (' . $phone . ')',
                        'value' => $phone,
                    ];
                }
                $mobile = $billing->get('mobile');
                if (!empty($mobile)) {
                    $options[] = [
                        'label' => $this->adapter->lexicon('commerce.billing_address') . ' - ' . $this->adapter->lexicon('commerce.address.mobile') . ' (' . $mobile . ')',
                        'value' => $mobile,
                    ];
                }
            }
            $shipping = $order->getShippingAddress();
            if ($shipping instanceof comOrderAddress) {
                $phone = $shipping->get('phone');
                if (!empty($phone)) {
                    $options[] = [
                        'label' => $this->adapter->lexicon('commerce.shipping_address') . ' - ' . $this->adapter->lexicon('commerce.address.phone') . ' (' . $phone . ')',
                        'value' => $phone,
                    ];
                }
                $mobile = $shipping->get('mobile');
                if (!empty($mobile)) {
                    $options[] = [
                        'label' => $this->adapter->lexicon('commerce.shipping_address') . ' - ' . $this->adapter->lexicon('commerce.address.mobile') . ' (' . $mobile . ')',
                        'value' => $mobile,
                    ];
                }
            }
        }
        $fields[] = new SelectField($this->commerce, [
            'name' => 'recipient',
            'label' => $this->adapter->lexicon('commerce.recipient'),
            'value' => $this->get('recipient'),
            'validation' => [
                new Required(),
            ],
            'options' => $options,
        ]);

        $fields[] = new TextareaField($this->commerce, [
            'name' => 'content',
            'label' => $this->adapter->lexicon('commerce_messagebird.content'),
            'description' => $this->adapter->lexicon('commerce_messagebird.content.simple_description'),
            'validation' => [
                new Required(),
                new Length(3, 65535),
            ],
            'value' => $this->get('content'),
        ]);

        if (!$this->get('sent')) {
            $fields[] = new CheckboxField($this->commerce, [
                'name' => 'properties[send_now]',
                'label' => $this->adapter->lexicon('commerce.message.send_now'),
                'description' => $this->adapter->lexicon('commerce.message.send_now.description'),
                'value' => true,
            ]);
        }

        return $fields;
    }
}
