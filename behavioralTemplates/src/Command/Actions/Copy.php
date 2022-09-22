<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Command\Actions;

use Exception;

class Copy extends AbstractAction
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
     * @throws Exception
     */
    function doAction(): string
    {
        $this->checkExceptions($this->firstPoint, $this->lastPoint);
        return substr($this->text, $this->firstPoint, $this->lastPoint - $this->firstPoint);
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