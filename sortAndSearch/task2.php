<?php
declare(strict_types=1);

require_once "./src/timingEcho.php";
require_once "./src/createRandomArray.php";

$length = 10000;
$array = createRandomArray($length);
$array2 = createRandomArray($length);
$delValue = 6000;
$array[rand(0, $length - 1)] = $delValue;
$array2[rand(0, $length - 1)] = $delValue;

function linearDelete(array &$array, int $delValue):float {
    $start = microtime(true);
    foreach ($array as $key => $value) {
        if($value === $delValue) {
            unset($array[$key]);
            break;
        }
    }
    return microtime(true) - $start;
}

function binaryDelete(array &$array, int $delValue): float {
    sort($array);
    $left = 0;
    $right = count($array) - 1;
    $start = microtime(true);
    while ($left <= $right) {
        $middle = floor(($right + $left)/2);
        if ($array[$middle] === $delValue) {
            unset($array[$middle]);
            break;
        }
        elseif ($array[$middle] > $delValue) {
            $right = $middle - 1;
        }
        elseif ($array[$middle] < $delValue) {
            $left = $middle + 1;
        }
    }
    return microtime(true) - $start;
}

timingEcho(linearDelete($array, $delValue), 'linearDelete');
timingEcho(binaryDelete($array2, $delValue), 'binaryDelete');
