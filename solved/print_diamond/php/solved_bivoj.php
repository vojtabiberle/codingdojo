<?php

$char = 'C';

define('A', 65);
define('Z', 90);
define('a', 97);
define('z', 122);

$num = chr($char);

if($num > A && $num < Z)
{
	$diff = A - $num;
}elseif($num > a && $num < Z)
{
	$diff = a - $num;
}
else
{
	echo 'wrong character'.PHP_EOL;
	exit(-1);
}

