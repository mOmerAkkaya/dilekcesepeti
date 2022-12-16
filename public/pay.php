<?php
include 'shopierAPI.php'; // İndirdiğimiz dosyada bulunan sınıfımızı dosyaya dahil ediyoruz.
$shopier = new Shopier('c01b076985a5cc4eb0e783f69b853fd2', '397b52a7c7ac144741f65b7355b6c88b'); // Kendi api bilgilerinizi gireceksiniz.
$shopier->setBuyer([ // Kullanıcı bilgileri
'id' => $_GET["id"], // Sipariş kodu
'paket' => $_GET["name"], // Paket adı
'first_name' => $_GET["bil_name"], 'last_name' => '', 'email' => $_GET["bil_email"], 'phone' => $_GET["bil_phone"]]); // Kullanıcının ad, soyad, telefon, email bilgileri
$shopier->setOrderBilling([
'billing_address' => $_GET["bil_email"], //Kullanıcının adresi
'billing_city' => 'Dijital', // İl
'billing_country' => 'Teslim', //Ülke
'billing_postcode' => '34000', //Posta Kodu
]);
$shopier->setOrderShipping([
'shipping_address' => 'Dijital Teslim', //Kullanıcının adresi
'shipping_city' => 'İstanbul', // İl
'shipping_country' => 'Türkiye', //Ülke
'shipping_postcode' => '34000', //Posta Kodu
]);
die($shopier->run($_GET['id'], $_GET['ucret'], 'https://dilekcesepeti.com.tr/odeme')); 
?>
