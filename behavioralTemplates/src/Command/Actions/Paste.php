<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Command\Actions;

class Paste extends AbstractAction
{

    public function __construct(
        string $text,
        private string $pastable,
        private int $point
    )
    {
        parent::__construct($text);
    }

    function doAction(): ?string
    {
        $firstString = $this->getStartString($this->point);
        $lastString = $this->getEndString($this->point);
        $this->setText($firstString . $this->pastable . $lastString);
        return null;
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