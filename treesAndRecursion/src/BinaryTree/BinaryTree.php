<?php
declare(strict_types=1);

namespace Jam18\treesAndRecursion\BinaryTree;

class BinaryTree 
{
    public function __construct(private BinaryNode $root)
    {
    }

    /**
     * @return BinaryNode
     */
    public function getRoot(): BinaryNode
    {
        return $this->root;
    }

    /**
     * @param BinaryNode $root
     */
    public function setRoot(BinaryNode $root): void
    {
        $this->root = $root;
    }
}