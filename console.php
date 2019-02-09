<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application('s-hiroshi/utils', '0.0.3');
$application->add(new \SH\Utils\Command\UtilsCommand());
$application->add(new \SH\Utils\Command\UTC2JSTCommand());
$application->add(new \SH\Utils\Command\Text2JsonCommand());
try {
    $application->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
