<?php
declare(strict_types=1);

use Jam18\StructuresAndAlgorithms\FileManager\FileManager;

require_once '../vendor/autoload.php';

$fm = new FileManager(__DIR__ . '/');

try {
    $fm = $fm->goIntoDir('forTest');
    $fm = $fm->goIntoDir('forTest1');
    $fm = $fm->goOutDir();
    $fm = $fm->goOutDir();
    echo $fm->getCurrentDirectory() . "\n";
    var_dump($fm->filterByExtensions(['php']));
    var_dump($fm->filterByName('tes'));
    var_dump($fm->getFileNames());
}

catch (Exception $exception) {
    echo $exception->getMessage();
}



