<?php

$_lang['commerce_messagebird'] = 'MessageBird';
$_lang['commerce_messagebird.description'] = 'Integration von MessageBird für die Nutzung von automatischen (bei Statusänderung) oder von manuellen Benachrichtigungen (per Auftragsnachrichten) per SMS.';
$_lang['commerce_messagebird.module_description'] = 'Wichtig: bevor Sie Nachrichten mit der MessageBird-API senden können, konfigurieren Sie die commerce_messagebird.access_key und commerce_messagebird.originator Systemeinstellungen.';
$_lang['commerce_messagebird.recipients'] = 'Empfänger';
$_lang['commerce_messagebird.recipients.description'] = 'Der oder die Empfänger der Textnachricht(en). Mehrere Empfänger durch Komma trennen. Zulässige Werte: "billing", "shipping", oder eine gültige Telefonnummer mit Ländervorwahl, z.B. +4912345678.';
$_lang['commerce_messagebird.content'] = 'Nachricht';
$_lang['commerce_messagebird.content.simple_description'] = 'Der Inhalt einer Textnachricht, die an den Empfänger gesendet wird. Bitte beachten Sie, dass SMS teurer werden, je länger sie sind.';
$_lang['commerce_messagebird.content.description'] = 'Die SMS, die gesendet werden soll. Diverse Platzhalter für Namen/Adresse verfügbar ({{ shipping_address.fullname }}, {{ shipping_address.address1 }}, etc.), Bestellinformationen ( {{ order.id }}, {{ order.total_formatted }}, etc.) und viele weitere. Verfügbare Platzhalter einzusehen unter: https://docs.modmore.com/en/Commerce/v1/Orders/Messages.html. Bitte beachten Sie, dass SMS teurer werden, je länger sie sind. MessageBird berechnet per 70(unicode) bzw. per 160(GSM 03.38) Zeichen.';
$_lang['commerce_messagebird.msgid'] = 'MessageBird Nachricht-ID';

$_lang['setting_commerce_messagebird.access_key'] = 'Zugriffsschlüssel';
$_lang['setting_commerce_messagebird.access_key_desc'] = 'Der Zugriffsschlüssel für die Integration von MessageBird. Finden oder erstellen Sie Ihren Zugriffsschlüssel im MessageBird Dashboard unter Entwickler > API Access (REST).';
$_lang['setting_commerce_messagebird.originator'] = 'Absender';
$_lang['setting_commerce_messagebird.originator_desc'] = 'Die "von" Telefon Nummer (im MSISDN Format einschließlich Vorwahl) oder eine alphanumerische Zeichenfolge, die als Absender auf den Text anzuwenden ist. Bis zu 11 Zeichen werden unterstützt.';

// Some lexicons are automatically called by the commerce core, based on the product class name, so add those.
$_lang['commerce.MessageBirdOrderMessage'] = 'SMS';
$_lang['commerce.send_MessageBirdOrderMessage'] = 'Senden Sie eine SMS';
$_lang['commerce.MessageBirdStatusChangeAction'] = 'SMS (via MessageBird)';
$_lang['commerce.add_MessageBirdStatusChangeAction'] = 'Senden Sie eine SMS (über MessageBird)';
