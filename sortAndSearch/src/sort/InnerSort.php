<?php
declare(strict_types=1);

namespace Jam18\SortAndSearch\sort;

class InnerSort extends AbstractSort
{

    function sort(): array
    {
        $start = $this->time();
        sort($this->array);
        $this->setTiming($this->time() - $start);
        return $this->array;
    }
}