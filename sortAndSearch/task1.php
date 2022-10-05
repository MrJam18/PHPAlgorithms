<?php
declare(strict_types=1);

use Jam18\SortAndSearch\sort\HeapSort;
use Jam18\SortAndSearch\sort\BubbleSort;
use Jam18\SortAndSearch\sort\InnerSort;
use Jam18\SortAndSearch\sort\QuickSort;

require_once '../vendor/autoload.php';
require_once './src/createRandomArray.php';

$array = createRandomArray();


$sorts = [];
$sorts[] = new BubbleSort($array);
$sorts[] = new HeapSort($array);
$sorts[] = new InnerSort($array);
$sorts[] = new QuickSort($array);

$min = $sorts[0];

foreach ($sorts as $key => $sort) {
    $sort->sort();
    $sort->echoTiming();
    $time = $sort->getTiming();
    if($sort->getTiming() < $min->getTiming()) {
        $min = $sort;
    }
}

echo "Winner is " . $min->getSortName() .". Time - only " . number_format($min->getTiming(), 5) . " sec.";