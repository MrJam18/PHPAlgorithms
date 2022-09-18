<?php
declare(strict_types=1);


use Jam18\StructureTemplates\External\CircleAreaLib;
use Jam18\StructureTemplates\External\SquareAreaLib;
use Jam18\StructureTemplates\FigureAdapters\CircleAdapter;
use Jam18\StructureTemplates\FigureAdapters\SquareAdapter;

require_once '../vendor/autoload.php';

$circleAdapter = new CircleAdapter(new CircleAreaLib());
$squareAdapter = new SquareAdapter(new SquareAreaLib());


echo $circleAdapter->circleArea(100);
echo "\n";
echo $squareAdapter->squareArea(50);
