<?php
declare(strict_types=1);

namespace Jam18\SortAndSearch\sort;

class QuickSort extends AbstractSort
{

    function sort(): array
    {
        $high = count($this->array) - 1;
        sort($this->array);
        $start = $this->time();
        $this->recursiveQuickSort(0, $high);
        $this->setTiming($this->time() - $start);
        return $this->array;
    }

    private function recursiveQuickSort($low, $high)
    {
        $i = $low;
        $j = $high;
        $middle = $this->array[(int)(($low + $high) / 2)];
        do {
            while ($this->array[$i] < $middle) ++$i; // Ищем элементы для правой части
            while ($this->array[$j] > $middle) --$j; // Ищем элементы для левой части
            if ($i <= $j) {
                $temp = $this->array[$i];
                $this->array[$i] = $this->array[$j];
                $this->array[$j] = $temp;
                $i++;
                $j--;
            }
        } while ($i < $j);
        if ($low < $j) {
            $this->recursiveQuickSort($low, $j);
        }
        if ($i < $high) {
            $this->recursiveQuickSort($i, $high);
        }
    }
}