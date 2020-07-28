<?php 
  echo $data=openssl_encrypt("Encriptado","AES-128-ECB","password");
  echo "<br>";
  echo $resuelto = openssl_decrypt($data,"AES-128-ECB", "password");
?>