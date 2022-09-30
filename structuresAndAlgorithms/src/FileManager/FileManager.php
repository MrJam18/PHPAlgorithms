<?php
declare(strict_types=1);

namespace Jam18\StructuresAndAlgorithms\FileManager;

use FilesystemIterator;
use FilterIterator;
use Jam18\StructuresAndAlgorithms\Exceptions\FileNotFound;
use Jam18\StructuresAndAlgorithms\Exceptions\NoDirException;

class FileManager extends FilesystemIterator
{
    function getFileNames(): array
    {
        $filenames = [];
        foreach($this as $file) {
            $filename = $file->getFilename();
            if($filename !== 'NULL') $filenames[] = $filename;
        }
        return $filenames;
    }

    function getCurrentDirectory(): string
    {
        return $this->getPath();
    }

    function filterByName(string $name): array
    {
        $filter = new FileNamesFilter($this, $name);
        return $this->filter($filter);
    }

    function filterByExtensions(array $extensions): array
    {
        $filter = new FileExtensionsFilter($this, $extensions);
        return $this->filter($filter);
    }

    private function filter(FilterIterator $filter): array
    {
        $files = [];
        foreach ($this as $file) {
            if($filter->accept()) $files[] = $file;
        }
        return $files;
    }

    /**
     * @throws NoDirException
     * @throws FileNotFound
     */
    function goIntoDir(string $dirname): self
    {
        $this->checkDir($dirname);
        return new self($this->getCurrentDirectory() . DIRECTORY_SEPARATOR . $dirname);
    }

    /**
     * @throws NoDirException
     * @throws FileNotFound
     */
    private function checkDir($dirname): void
    {
       foreach ($this as $file)
       {
           if($file->getFilename() === $dirname)
           {
               if(!$file->isDir()) throw new NoDirException("file with name $dirname is not directory");
               return;
           }
       }
       throw new FileNotFound("file with name $dirname not found");
    }

    function goOutDir(): self
    {
        $names = explode(DIRECTORY_SEPARATOR, $this->getCurrentDirectory());
        $lastName = $names[count($names) - 1];
        $path = preg_replace("/$lastName$/", '', $this->getCurrentDirectory());
        return new self($path);
    }
}