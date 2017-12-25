<?php

$_lang['commerce_messagebird'] = 'MessageBird';
$_lang['commerce_messagebird.description'] = 'Integratie van MessageBird, die het mogelijk maakt om berichten over bestellingen via SMS te versturen. Zowel automatisch (via een statuswijzigingactie) of handmatig (via berichten bij bestellingen).';
$_lang['commerce_messagebird.module_description'] = 'Belangrijk: voordat het mogelijk is om berichten via de MessageBird API te versturen, moeten de commerce_messagebird.access_key en commerce_messagebird.originator systeeminstellingen worden ingesteld.';
$_lang['commerce_messagebird.recipients'] = 'Ontvangers';
$_lang['commerce_messagebird.recipients.description'] = 'De ontvanger(s) voor de SMS bericht(en) die worden verstuurd. Voer meerdere ontvangers in gescheiden met komma\'s. Geldige waarden zijn "billing", "shipping", of een geldig telefoonnummer inclusief landnummer, zoals +31612345678.';
$_lang['commerce_messagebird.content'] = 'Bericht';
$_lang['commerce_messagebird.content.simple_description'] = 'De inhoud om in een SMS bericht naar de klant te sturen. Houdt er rekening mee dat SMS berichten gefactureerd worden op basis van het aantal tekens.';
$_lang['commerce_messagebird.content.description'] = 'Het bericht om te versturen. Verschillende placeholders zijn hiervoor beschikbaar, zoals voor naam/adres informatie ({{ shipping_address.fullname }}, {{ shipping_address.address1 }}, enz.), bestelgegevens ({{ order.id }}, {{ order.total_formatted }}, enz.), en meer. Zie de documentatie op https://docs.modmore.com/en/Commerce/v1/Orders/Messages.html voor de beschikbare placeholders. Houdt er rekening mee dat SMS is bedoeld voor korte berichten, en dat MessageBird factureert per 70 (unicode) of 160 (GSM 03.38) tekens.';
$_lang['commerce_messagebird.msgid'] = 'MessageBird bericht-ID';

$_lang['setting_commerce_messagebird.access_key'] = 'Toegangstoken';
$_lang['setting_commerce_messagebird.access_key_desc'] = 'De toegangstoken om te gebruiken voor de MessageBird integratie. Zoek of maak een toegangstoken aan in het MessageBird dashboard, onder Developers > API Access (REST).';
$_lang['setting_commerce_messagebird.originator'] = 'Afzender';
$_lang['setting_commerce_messagebird.originator_desc'] = 'Het telefoonnummer (in MSISDN formaat inclusief landnummer) of alfanumerieke tekst om te gebruiken als afzender van het bericht. Maximaal 11 tekens zijn ondersteund.';

// Some lexicons are automatically called by the commerce core, based on the product class name, so add those.
$_lang['commerce.MessageBirdOrderMessage'] = 'SMS';
$_lang['commerce.send_MessageBirdOrderMessage'] = 'Verstuur een SMS';
$_lang['commerce.MessageBirdStatusChangeAction'] = 'SMS (met MessageBird)';
$_lang['commerce.add_MessageBirdStatusChangeAction'] = 'Verstuur een SMS (met MessageBird)';
