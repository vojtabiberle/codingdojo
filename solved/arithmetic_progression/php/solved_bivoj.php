<?php

$fileName = '../data2.txt';

$file = file($fileName);

$inSequence = trim($file[0]);

$sequence = explode(' ', $file[1]);

//var_dump($sequence);

$diff1 = $sequence[0] - $sequence[1];
$diff2 = $sequence[1] - $sequence[2];
$diff3 = $sequence[2] - $sequence[3];

//echo $diff1.' '.$diff2.' '.$diff3.PHP_EOL;

$diff = 0;

if($diff1 == $diff2)
{
	$diff = $diff1;
}
elseif($diff1 == $diff3)
{
	$diff = $diff1;
}
elseif($diff2 == $diff3)
{
	$diff = $diff2;
}

$diff = $diff*(-1);

echo 'difference: '.$diff.PHP_EOL;

if($diff == 0)
{
	exit(0);
}

for($i = 0; $i < $inSequence; $i++)
{
	$next = $sequence[$i] + $diff;
	//echo $next.' ? '.$sequence[$i+1].PHP_EOL;
	if(!isset($sequence[$i+1]))
	{
		echo 'missing: '.($sequence[0]-$diff).' OR '.$next.PHP_EOL;
		exit(0);
	}
	if($next != $sequence[$i+1])
	{
		echo 'missing: '.$next.PHP_EOL;
		exit(0);
	}
}