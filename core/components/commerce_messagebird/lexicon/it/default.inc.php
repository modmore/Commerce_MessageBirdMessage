<?php

$_lang['commerce_messagebird'] = 'MessageBird';
$_lang['commerce_messagebird.description'] = 'Integration of MessageBird, to allow sending order messages via SMS automatically (as status change action) or manually (through order messages).';
$_lang['commerce_messagebird.module_description'] = 'Important: before you can send messages with the MessageBird API, configure the commerce_messagebird.access_key and commerce_messagebird.originator system settings.';
$_lang['commerce_messagebird.recipients'] = 'Destinatario';
$_lang['commerce_messagebird.recipients.description'] = 'The recipient(s) of the text message(s) to be sent. Enter recipients separated by a comma. Valid values include: "billing", "shipping", or a valid phone number including country code, like +31612345678.';
$_lang['commerce_messagebird.content'] = 'Messaggio';
$_lang['commerce_messagebird.content.simple_description'] = 'The content to send in a text message to the customer. Keep in mind text messages are billed by the number of characters.';
$_lang['commerce_messagebird.content.description'] = 'The text message to send. You can use various placeholders for name/address information ({{ shipping_address.fullname }}, {{ shipping_address.address1 }}, etc), order information ({{ order.id }}, {{ order.total_formatted }}, etc) and more. See https://docs.modmore.com/en/Commerce/v1/Orders/Messages.html for available placeholders. Keep in mind that SMS is for short messages, and that MessageBird bills per 70 (unicode)/160 (GSM 03.38) characters.';
$_lang['commerce_messagebird.msgid'] = 'MessageBird Message ID';

$_lang['setting_commerce_messagebird.access_key'] = 'Access Key';
$_lang['setting_commerce_messagebird.access_key_desc'] = 'The access key to use for the MessageBird integration. Find or create your access key in the MessageBird dashboard, under Developers > API Access (REST).';
$_lang['setting_commerce_messagebird.originator'] = 'Originator';
$_lang['setting_commerce_messagebird.originator_desc'] = 'The "from" phone number (in MSISDN format including country code) or alphanumerical string to use as the originator on the text. Up to 11 characters are supported.';

// Some lexicons are automatically called by the commerce core, based on the product class name, so add those.
$_lang['commerce.MessageBirdOrderMessage'] = 'SMS';
$_lang['commerce.send_MessageBirdOrderMessage'] = 'Invia un SMS';
$_lang['commerce.MessageBirdStatusChangeAction'] = 'SMS (via MessageBird)';
$_lang['commerce.add_MessageBirdStatusChangeAction'] = 'Invia un SMS (via MessageBird)';
