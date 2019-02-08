<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application('s-hiroshi/utils', '0.0.1');
$application->add(new \SH\Utils\Command\UtilsCommand());
try {
    $application->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
