<?php
  // Domain adı
  $domain = "emrekarademir.com";

  // WHOIS sunucusu adresi
  $whois_server = "whois.iana.org";

  // WHOIS sunucusundan domain bilgilerini al
  $output = shell_exec("whois $domain");

  // Domainin sona erme tarihini bul
  preg_match("/Expiration Date: (.+)/", $output, $matches);
  $expiration_date = $matches[1];

  // Sona erme tarihini zaman damgasına çevir
  $expiration_timestamp = strtotime($expiration_date);

  // Şimdiki zaman damgası
  $current_timestamp = time();

  // Domainin kalan süresini hesapla
  $remaining_time = $expiration_timestamp - $current_timestamp;

  // Kalan süreyi gün olarak hesapla
  $remaining_days = floor($remaining_time / (60 * 60 * 24));

  // Sonuçları ekrana yaz
  echo "Domain: $domain<br>";
  echo "Sona erme tarihi: $expiration_date<br>";
  echo "Kalan süre: $remaining_days gün<br>";
?>
