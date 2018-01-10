<?php

$_lang['commerce_messagebird'] = 'MessageBird';
$_lang['commerce_messagebird.description'] = 'Integrasi MessageBird untuk memungkinkan pengiriman pesan pesanan via SMS secara otomatis (sebagai tindakan perubahan status) atau manual (melalui pesan pesanan).';
$_lang['commerce_messagebird.module_description'] = 'Penting: sebelum Anda dapat mengirim pesan dengan API MessageBird, konfigurasikan perdagangan_MessageBird.akses_kunci dan perdagangan_MessageBird.pencipta pengaturan sistem.';
$_lang['commerce_messagebird.recipients'] = 'Penerima';
$_lang['commerce_messagebird.recipients.description'] = 'Penerima(s) dari pesan teks(s) untuk dikirim. Masukkan penerima yang dipisahkan dengan koma. Nilai yang valid meliputi: "penagihan", "pengiriman", atau nomor telepon yang valid termasuk kode negara, seperti +31612345678.';
$_lang['commerce_messagebird.content'] = 'Pesan';
$_lang['commerce_messagebird.content.simple_description'] = 'Konten untuk mengirim pesan teks ke pelanggan. Perlu diingat pesan teks ditagih dengan jumlah karakter.';
$_lang['commerce_messagebird.content.description'] = 'Pesan teks untuk dikirim Anda bisa menggunakan berbagai pemegang tempat untuk informasi nama/alamat ({{ shipping_address.fullname }}, {{ shipping_address.address1 }}, dll), informasi pemesanan ({{ order.id }}, {{ order.total_formatted }}, dll) dan lebih. Lihat https://docs.modmore.com/en/Commerce/v1/Orders/Messages.html untuk tempat yang tersedia. Ingatlah bahwa SMS adalah untuk pesan singkat, dan tagihan MessageBird itu per 70 (unicode)/160 (GSM 03.38) karakter.';
$_lang['commerce_messagebird.msgid'] = 'MessageBird pesan ID';

$_lang['setting_commerce_messagebird.access_key'] = 'Kunci akses';
$_lang['setting_commerce_messagebird.access_key_desc'] = 'Kunci akses yang digunakan untuk integrasi MessageBird. Cari atau buat kunci akses Anda di dasbor MessageBird, di bawah Pengembang > Akses API (REST).';
$_lang['setting_commerce_messagebird.originator'] = 'Pencipta';
$_lang['setting_commerce_messagebird.originator_desc'] = 'Nomor telepon "dari" (dalam format MSISDN termasuk kode negara) atau string alfanumerik untuk digunakan sebagai pencetus teks. Maksimal di dukung 11 karakter.';

// Some lexicons are automatically called by the commerce core, based on the product class name, so add those.
$_lang['commerce.MessageBirdOrderMessage'] = 'SMS';
$_lang['commerce.send_MessageBirdOrderMessage'] = 'Kirim SMS';
$_lang['commerce.MessageBirdStatusChangeAction'] = 'SMS (melalui MessageBird)';
$_lang['commerce.add_MessageBirdStatusChangeAction'] = 'Kirim SMS (melalui MessageBird)';
