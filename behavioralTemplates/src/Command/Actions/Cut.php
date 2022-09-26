<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Command\Actions;

class Cut extends AbstractAction
{
    public function __construct(
        string $text,
        private int $firstPoint,
        private int $lastPoint
    )
    {
        parent::__construct($text);
    }

    /**
     * @throws \Exception
     */
    function doAction(): string
    {
        $this->checkExceptions($this->firstPoint, $this->lastPoint);
        $firstString = $this->getStartString($this->firstPoint);
        $lastString = $this->getEndString($this->lastPoint);
        $result = substr($this->text, $this->firstPoint, $this->lastPoint - $this->firstPoint);
        $this->text = $firstString . $lastString;
        return $result;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}