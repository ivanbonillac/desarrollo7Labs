<?php
include("class_lib.php");

// Acceder a la propiedad estática $mi_static de la clase Foo
print Foo::$mi_static . " value (1)<br>";

$foo = new Foo();

// Llamar al método estático staticValor() de la clase Foo
print $foo->staticValor() . " value (2)<br>";

// Intentar acceder a una propiedad estática como una propiedad de instancia (esto no es válido)
// Debería ser Foo::$mi_static en lugar de $foo->mi_static
print $foo::$mi_static . " value (3)<br>";

// Acceder a la propiedad estática $mi_static de la clase Bar
print Bar::$mi_static . " value (4)<br>";

$bar = new Bar();

// Llamar al método estático fooStatic() de la clase Bar
print $bar->fooStatic() . " value (5)<br>";
?>
