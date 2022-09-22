<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Command\Actions;

use Exception;

abstract class AbstractAction
{

    public function __construct(protected string $text)
    {
    }

    abstract function setText(string $text): void;
    abstract function getText(): string;
    abstract function doAction(): ?string;
//    abstract function execute(int $firstPoint, int $lastPoint, int $changingPlace): string;

    protected function checkExceptions(int $start, int $end, int $changingPlace = 0): void
    {
        $length = strlen($this->text);
        if($start > $end || $start > $length || $end > $length || $changingPlace > $length) throw new Exception('points was incorrect');
    }
    protected function getStartString(int $key): string
    {
       return substr($this->text, 0, $key);
    }
    protected function getEndString(int $key): string
    {
       return substr($this->text, $key);
    }

}