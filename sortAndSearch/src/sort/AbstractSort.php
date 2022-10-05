<?php
declare(strict_types=1);

namespace Jam18\SortAndSearch\sort;

abstract class AbstractSort
{
    private float $timing;
    private string $sortName;
    public function __construct(protected array $array)
    {
        $this->sortName = (new \ReflectionClass($this))->getShortName();
    }

    abstract function sort(): array;

    protected function setTiming(float $timing): void
    {
        $this->timing = round($timing, 5);
    }

    /**
     * @return string
     */
    public function getSortName(): string
    {
        return $this->sortName;
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
}