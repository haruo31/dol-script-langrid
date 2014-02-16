<?php

// This script is standalone test script.
// It doesn't run on PHPUnit framework.

require_once '../service_test_framework/autoload.php';

$suite = new PHPUnit_Framework_TestSuite();


foreach (glob('../service_tests/*Test.php') as $f) {
	$suite->addTestFile($f);
	echo $f . "\n";
}

echo $suite->count() . "\n ";

$ret = $suite->run();

foreach ($ret->errors() as $e) {
    echo $e->toString() . "\n";
}
