<?php
declare(strict_types=1);

namespace Jam18\SortAndSearch\sort;

use Jam18\StructureTemplates\Interfaces\ISquare;

class BubbleSort extends AbstractSort
{


    function sort(): array
    {
        $start = $this->time();
        for ($i = 0; $i < count($this->array); $i++) {
            $count = count($this->array);

            for ($j = $i + 1; $j < $count; $j++) {
                if ($this->array[$i] > $this->array[$j]) {
                    $temp = $this->array[$j];
                    $this->array[$j] = $this->array[$i];
                    $this->array[$i] = $temp;
                }
            }
        }
        $this->setTiming($this->time() - $start);
        return $this->array;
    }
}