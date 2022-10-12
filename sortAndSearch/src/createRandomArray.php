<?php
declare(strict_types=1);


function createRandomArray(int $length = 10000): array
{
    $array = [];
    for($i = 0; $i < $length; $i++) {
        $array[] = rand(0, $length - 1);
    }
    return $array;
}
