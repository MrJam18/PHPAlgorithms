<?php
declare(strict_types=1);

namespace Jam18\StructureTemplates\FigureAdapters;

use Jam18\StructureTemplates\External\CircleAreaLib;
use Jam18\StructureTemplates\Interfaces\ICircle;

class CircleAdapter implements ICircle
{
    public function __construct(private CircleAreaLib $lib)
    {
    }

    function circleArea(int $circumference): int|float
    {
        $diameter = $circumference / M_PI;
        return $this->lib->getCircleArea($diameter);
    }
}