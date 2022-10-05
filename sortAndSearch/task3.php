<?php
declare(strict_types=1);

require_once './src/createRandomArray.php';

$array = createRandomArray(1000000);
sort($array);

function echoSteps($steps, $searchName) {
    echo "$searchName - $steps steps. \n";
}

function linearSearch (array $myArray, int $value): ?int {
    $steps = 0;
    $count = count($myArray);
    for ($i=0; $i < $count; $i++) {
        $steps++;
        if ($myArray[$i] === $value) {
            echoSteps($steps, 'linearSearch');
            return $i;
        }
        elseif ($myArray[$i] > $value) {
            echoSteps($steps, 'linearSearch');
            return null;
        }
    }
    echoSteps($steps, 'linearSearch');
    return null;
}

function binarySearch ($myArray, $num): float|string|null {
    $steps = 0;
    $left = 0;
    $right = count($myArray) - 1;
    while ($left <= $right) {
        $steps++;
        $middle = floor(($right + $left)/2);
        if ($myArray[$middle] == $num) {
            echoSteps($steps, 'binarySearch');
            return $middle;
        }
        elseif ($myArray[$middle] > $num) {
            $right = $middle - 1;
        }
        elseif ($myArray[$middle] < $num) {
            $left = $middle + 1;
        }
    }
    echoSteps($steps, 'binarySearch');
    return null;
}


function interpolationSearch($myArray, $num)
{
    $steps = 0;
    $start = 0;
    $last = count($myArray) - 1;
    while (($start <= $last) && ($num >= $myArray[$start])
        && ($num <= $myArray[$last])) {
        $steps++;
        $pos = floor($start + (
                (($last - $start) / ($myArray[$last] - $myArray[$start]))
                * ($num - $myArray[$start])
            ));
        if ($myArray[$pos] == $num) {
            echoSteps($steps, 'interpolationSearch');
            return $pos;
        }
        if ($myArray[$pos] < $num) {
            $start = $pos + 1;
        }
        else {
            $last = $pos - 1;
        }
    }
    echoSteps($steps, 'interpolationSearch');
    return null;
}

$searchValue = 500000;
$linear = linearSearch($array, $searchValue);
$binary = binarySearch($array, $searchValue);
$inter = interpolationSearch($array, $searchValue);

echo "linear found index - $linear, binary found index - $binary, interpolation found index - $inter";


