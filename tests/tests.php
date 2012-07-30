<?php

require_once '../src/anpf.php';
//require_once 'PHPUnit.php';

$suite  = new PHPUnit_TestSuite("AnpfTest");
$result = PHPUnit::run($suite);

echo $result -> toString();