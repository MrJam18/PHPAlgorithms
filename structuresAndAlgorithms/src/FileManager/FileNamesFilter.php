<?php
declare(strict_types=1);

namespace Jam18\StructuresAndAlgorithms\FileManager;

use DirectoryIterator;
use FilterIterator;

class FileNamesFilter extends FilterIterator
{

    public function __construct(DirectoryIterator $iterator, private string $filter)
    {
        parent::__construct($iterator);
    }

    public function accept(): bool
    {
        $regex = "/$this->filter/";
        return (boolean)preg_match($regex, $this->getFilename());
    }
}