<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Fraction\Kernel;
use Fraction\Http\Request;

$request = Request::createFromGlobals();

$kernel = Kernel::getKernel();
$kernel->setProjectRoot(__DIR__ . '/..');

$response = $kernel->handle($request);
$response->send();
