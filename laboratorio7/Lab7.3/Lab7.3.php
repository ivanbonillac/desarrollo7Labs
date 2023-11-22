<?php
include("class_lib.php");

$temp1 = new Template;
$temp1->ponerVariable("var1", "Valor 1");
$temp1->ponerVariable("var2", "Valor 2");
$temp1->ponerVariable("var3", "Valor 3");

$prueba = "Esto es una prueba de {var1}, {var2} y {var3}.";
echo $temp1->verHtml($prueba);
?>
