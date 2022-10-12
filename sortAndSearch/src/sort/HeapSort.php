<?php
declare(strict_types=1);

namespace Jam18\SortAndSearch\sort;

use SplMaxHeap;

class HeapSort extends SplMaxHeap
{
    private float $timing;
    private string $sortName;

    public function __construct(protected array $array)
    {
        $this->sortName = (new \ReflectionClass($this))->getShortName();
    }

    /**
     * @return string
     */
    public function getSortName(): string
    {
        return $this->sortName;
    }

    protected function setTiming(float $timing): void
    {
        $this->timing = round($timing, 5);
    }

    /**
     * @return float
     */
    public function getTiming(): float
    {
        return $this->timing;
    }

    function echoTiming() {
        echo "$this->sortName - " .  number_format($this->timing, 5) . " sec.\n";
    }

    protected function time(): float {
        return microtime(true);
    }

    protected function compare($value1, $value2): int
    {
        if($value1 === $value2) return 0;
        if($value1 > $value2) return 1;
        return -1;
    }

    function sort(): array
    {
        $start = $this->time();
        foreach ($this->array as $value) {
            $this->insert($value);
        }
        $this->setTiming($this->time() - $start);
        $this->array = iterator_to_array($this);
        return $this->array;
    }
}