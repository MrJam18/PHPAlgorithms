<?php
declare(strict_types=1);

namespace Jam18\StructureTemplates\External;

class SquareAreaLib 
{
    public function getSquareArea(int|float $diagonal): int|float
    {
        $area = ($diagonal**2)/2;
        return $area;
    }

}