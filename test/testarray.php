<?php
$array=new ArrayObject();
class Mycollection extends ArrayObject{}
$collection=new Mycollection();
$collection[]='bar';
var_dump($collection);
//object(Mycollection)#2 (1) { ["storage":"ArrayObject":private]=> array(1) { [0]=> string(3) "bar" } }
 ?>