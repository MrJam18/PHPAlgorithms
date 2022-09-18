<?php
declare(strict_types=1);

namespace Jam18\StructureTemplates\External;

class CircleAreaLib 
{
    public function getCircleArea(int|float $diagonal): int|float
    {
        $area = (M_PI * $diagonal**2)/4;
        return $area;
    }
}