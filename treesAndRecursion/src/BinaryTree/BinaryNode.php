<?php
declare(strict_types=1);

namespace Jam18\treesAndRecursion\BinaryTree;

use Exception;

class BinaryNode
{
    private ?BinaryNode $left = null;
    private ?BinaryNode $right = null;

    public function __construct(
        private ?string $value = null
    )
    {
    }

    /**
     * @return BinaryNode|null
     */
    public function getLeft(): ?BinaryNode
    {
        return $this->left;
    }

    /**
     * @return BinaryNode|null
     */
    public function getRight(): ?BinaryNode
    {
        return $this->right;
    }

    /**
     * @return ?string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param BinaryNode $left
     */
    public function setLeft(BinaryNode $left): void
    {
        $this->left = $left;
    }

    function setEmpty(BinaryNode $node): void
    {
        if($this->left !== null) {
            $this->left = $node;
        }
        elseif($this->right !== null) {
            $this->right = $node;
        }
        else throw new Exception('node dont have empty childrens');
    }

    /**
     * @param BinaryNode $right
     */
    public function setRight(BinaryNode $right): void
    {
        $this->right = $right;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

}