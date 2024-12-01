<?php

use Services\Sort;

require_once "Services/Sort.php";

$sort = new Sort(10);
for ($n = 10; $n <= 10_000_000;$n *= 10)
{
//$n = 10;
    $sort->setRandom($n);
//$sort->setSorted($n);
    $start = (int) (microtime(true) * 1000);
//    $sort->bubbleSort();
    $sort->ShellSort();
    $ms = (int) (microtime(true) * 1000) - $start;
    echo ($sort->toString());
    echo ' ' . $ms . 'ms' . PHP_EOL;
}

