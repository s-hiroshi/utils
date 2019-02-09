<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application('s-hiroshi/utils', '0.0.2');
$application->add(new \SH\Utils\Command\UtilsCommand());
$application->add(new \SH\Utils\Command\UTC2JSTCommand());
try {
    $application->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
