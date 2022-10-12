<?php
declare(strict_types=1);

namespace Jam18\treesAndRecursion\MathTree;

use Jam18\treesAndRecursion\BinaryTree\BinaryNode;
use Jam18\treesAndRecursion\BinaryTree\BinaryTree;

class MathTree
{
    const priorities = ['+' => 'third', '-' => 'third', '*' => 'second', '/'=> 'second', '^' => 'first', '√'=> 'first'];
    private BinaryTree $tree;
    private array $lexemes;

    public function __construct(private string $expression)
    {
    }

    function buildTree()
    {
        $this->lexemes = [];
        preg_match_all("/\d+|\D/", trim($this->expression), $this->lexemes);
        $this->lexemes = $this->lexemes[0];
        $queue = $this->getQueuedIndexes();
        $currentIndex = array_shift($queue);
        $current = new BinaryNode($this->lexemes[$currentIndex]);
        $current->setLeft(new BinaryNode($this->lexemes[$currentIndex - 1]));
        $current->setRight(new BinaryNode($this->lexemes[$currentIndex + 1]));
        foreach ($queue as $index) {
            $root = new BinaryNode($this->lexemes[$index]);
            if($currentIndex > $index) {
                $root->setRight($current);
                $root->setLeft(new BinaryNode($this->lexemes[$index - 1]));
            }
            else {
                $root->setLeft($current);
                $root->setRight(new BinaryNode($this->lexemes[$index + 1]));
            }
            $currentIndex = $index;
            $current = $root;
        }
        $this->tree = new BinaryTree($current);
    }

    private function getQueuedIndexes(int $startPos = 0, ?int $endPos = null): array
    {
        if($endPos === null) $endPos = count($this->lexemes);
        $priority = [];
        $first = [];
        $second = [];
        $third = [];
        $hooks = 0;
        $hooksStartPos = null;
        $start = false;
        $unpriorityFlag = false;
        for ($key = $startPos; $key < $endPos; $key++) {
            $lexeme = $this->lexemes[$key];
            if(isset(static::priorities[$lexeme]) && !$unpriorityFlag) {
                ${static::priorities[$lexeme]}[] = $key;
            }
            elseif($lexeme === '(')  {
                $hooks++;
                if($start === false)  {
                    $start = true;
                    $hooksStartPos = $key + 1;
                    $unpriorityFlag = true;
                }
            }
            elseif($lexeme === ')') {
                $hooks--;
                if($start === true && $hooks === 0) {
                    $priority = array_merge($priority, $this->getQueuedIndexes($hooksStartPos, $key));
                    $unpriorityFlag = false;
                    $start = false;
                }
            }
        }

        return array_merge($priority, $first, $second, $third);
    }

    private function echoNode(BinaryNode $node): void
    {
        $left = $node->getLeft() ? $node->getLeft()->getValue() : 'null';
        $right = $node->getRight() ? $node->getRight()->getValue() : 'null';
        echo 'root ' . $node->getValue() . ". Left $left, right $right \n";
        if($node->getLeft() !== null) $this->echoNode($node->getLeft());
        if($node->getRight() !== null) $this->echoNode($node->getRight());
    }
    function echoTree()
    {
        $this->echoNode($this->tree->getRoot());
    }

    private function buildNode()
    {

    }



}