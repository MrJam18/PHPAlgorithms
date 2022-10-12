<?php
declare(strict_types=1);


use Jam18\treesAndRecursion\MathTree\MathTree;

require_once '../vendor/autoload.php';


$expression = '(1-5)*6+7/2';

$tree = new MathTree($expression);

$tree->buildTree();
$tree->echoTree();

