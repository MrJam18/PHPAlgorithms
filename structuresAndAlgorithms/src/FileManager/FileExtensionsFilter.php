<?php
declare(strict_types=1);

namespace Jam18\StructuresAndAlgorithms\FileManager;

use DirectoryIterator;
use FilterIterator;

class FileExtensionsFilter extends FilterIterator
{

    public function __construct(DirectoryIterator $iterator, private array $ext)
    {
        parent::__construct($iterator);
    }

    public function accept(): bool
    {
        return in_array($this->getExtension(), $this->ext);
    }
}