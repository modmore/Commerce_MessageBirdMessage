<?php
use modmore\Commerce\Admin\Widgets\Form\TextareaField;
use modmore\Commerce\Admin\Widgets\Form\TextField;
use modmore\Commerce\Admin\Widgets\Form\Validation\Length;
use modmore\Commerce\Admin\Widgets\Form\Validation\Required;

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
class MessageBirdStatusChangeAction extends comStatusChangeAction
{
    /**
     * Prepare an order message for the text. The actual message sending is handled in the order message.
     *
     * @param comOrder $order
     * @param comStatus $oldStatus
     * @param comStatus $newStatus
     * @param comStatusChange $statusChange
     *
     * @return bool;
     */
    public function process(comOrder $order, comStatus $oldStatus, comStatus $newStatus, comStatusChange $statusChange)
    {
        $recipients = $this->getProperty('recipients', '');
        $recipients = array_map('trim', explode(',', $recipients));

        foreach ($recipients as $recipient) {
            switch ($recipient) {
                case 'billing':
                    if ($address = $order->getBillingAddress()) {
                        $mobile = $address->get('mobile');
                        $phone = $address->get('phone');
                        $recipient = !empty($mobile) ? $mobile : $phone;
                    }
                    break;
                case 'shipping':
                    if ($address = $order->getShippingAddress()) {
                        $mobile = $address->get('mobile');
                        $phone = $address->get('phone');
                        $recipient = !empty($mobile) ? $mobile : $phone;
                    }
                    break;
            }

            /** @var comOrderEmailMessage $message */
            $message = $this->adapter->newObject('MessageBirdOrderMessage');
            $message->fromArray([
                'order' => $order->get('id'),
                'content' => $this->getProperty('content'),
                'recipient' => $recipient,
                'created_on' => time(),
                'created_by' => 0,
            ]);
            $message->setProperties([
                'subject' => $this->getProperty('subject'),
                'bcc' => $this->getProperty('bcc', ''),
            ]);
            if ($message->save()) {
                $message->send();
            }
        }
        return true;
    }

    public function getModelFields()
    {
        $fields = [];

        $fields[] = new TextField($this->commerce, [
            'name' => 'properties[recipients]',
            'label' => $this->adapter->lexicon('commerce_messagebird.recipients'),
            'description' => $this->adapter->lexicon('commerce_messagebird.recipients.description'),
            'value' => $this->getProperty('recipients'),
            'validation' => [
                new Required(),
            ],
        ]);

        $fields[] = new TextareaField($this->commerce, [
            'name' => 'properties[content]',
            'label' => $this->adapter->lexicon('commerce_messagebird.content'),
            'description' => $this->adapter->lexicon('commerce_messagebird.content.description'),
            'validation' => [
                new Required(),
                new Length(3, 65535),
            ],
            'value' => $this->getProperty('content'),
        ]);

        return $fields;
    }
}
