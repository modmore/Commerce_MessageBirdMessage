<?php

$_lang['commerce_messagebird'] = 'MessageBird';
$_lang['commerce_messagebird.description'] = 'Integración de MessageBird, para permitir envíar mensajes con órdenes vía SMS automáticamente (como acción de cambio de estado) o manualmente (a través de mensajes de órdenes).';
$_lang['commerce_messagebird.module_description'] = 'Importante: antes que puedas enviar mensajes con la API de MessageBird, cambia la configuración del sistema commerce_messagebird.access_key and commerce_messagebird.originator.';
$_lang['commerce_messagebird.recipients'] = 'Receptores de';
$_lang['commerce_messagebird.recipients.description'] = 'El/los receptor(es) de el/los mensaje(s) a enviar. Escriba los receptores separados por una coma. Los valores válidos son: "facturación", "envío", o un número de teléfono válido con su código de país incluido, como +31612345678.';
$_lang['commerce_messagebird.content'] = 'Mensaje';
$_lang['commerce_messagebird.content.simple_description'] = 'El contenido a enviar en un mensaje de texto al cliente. Ten en cuenta que los mensajes de cuenta son cobrados por número de caracteres.';
$_lang['commerce_messagebird.content.description'] = 'El mensaje de texto a enviar. Puedes usar varios marcadores para la información del nombre/dirección ({{ shipping_address.fullname }}, {{ shipping_address.address1 }}, entre otros), información de orden ({{ order.id }}, {{ order.total_formatted }}, entre otros) y más. Vea https://docs.modmore.com/en/Commerce/v1/Orders/Messages.html para marcadores disponibles. Ten en cuenta que el SMS es las siglas, en inglés, para mensaje corto y que MessaBird cobra por 70 (unicode)/160 (GSM 03.38) caracteres.';
$_lang['commerce_messagebird.msgid'] = 'ID de mensaje de Message ID';

$_lang['setting_commerce_messagebird.access_key'] = 'Llave de acceso';
$_lang['setting_commerce_messagebird.access_key_desc'] = 'La clave de acceso para usar la integración de Message Bird. Busca o crea tu llave de acceso en la consola de Message Bird, debajo de Desarrolladores > Acceso API (REST).';
$_lang['setting_commerce_messagebird.originator'] = 'Emisor';
$_lang['setting_commerce_messagebird.originator_desc'] = 'El número de teléfono "de" (en formato MSISDN incluyendo el código del país) o una cadena alfanumérica para usar como el emisor del texto. Hasta 11 caracteres son compatibles.';

// Some lexicons are automatically called by the commerce core, based on the product class name, so add those.
$_lang['commerce.MessageBirdOrderMessage'] = 'SMS';
$_lang['commerce.send_MessageBirdOrderMessage'] = 'Enviar un SMS';
$_lang['commerce.MessageBirdStatusChangeAction'] = 'SMS (via MessageBird)';
$_lang['commerce.add_MessageBirdStatusChangeAction'] = 'Enviar un SMS (via MessageBird)';
