<?php require "app/views/base.php";?>
<body>
  <?php include "app/views/header.php";?>
  <section class='full text-center'>
    <?php include "app/views/form.php";?>
  </section>
<body>

<?php

if ($_SERVER['REQUEST_METHOD']==='POST'){
    print_r($_POST);


}
?>