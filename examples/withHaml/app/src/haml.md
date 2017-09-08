# Forma común de pasar HAML a PHP 
haml app/src/index.haml index.php

:plain
  echo "hola"


## de HAML to PHP (forma 2)
usando la gema haml-contrib
haml -rhaml/filters/php [input] [output]

Ejemplo:
haml -rhaml/filters/php app/src/index.haml index.php


$ cat file.haml 
:php
  echo "hola";
$ haml -rhaml/filters/php file.haml 
<?php
  echo "hola"
?>

Data:
https://github.com/haml/haml-contrib
https://stackoverflow.com/questions/14130254/php-code-filter-in-nanocs-haml-code
https://github.com/haml/haml-contrib/issues/3

