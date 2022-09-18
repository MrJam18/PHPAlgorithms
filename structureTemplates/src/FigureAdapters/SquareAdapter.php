<?php
declare(strict_types=1);

namespace Jam18\StructureTemplates\FigureAdapters;

use Jam18\StructureTemplates\External\SquareAreaLib;
use Jam18\StructureTemplates\Interfaces\ISquare;

class SquareAdapter implements ISquare
{
    public function __construct(private SquareAreaLib $lib)
    {
    }

    function squareArea(int $sideSquare): int|float
    {
        $diagonal = $sideSquare * 1.4142;
        return $this->lib->getSquareArea($diagonal);
    }
}