<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Command\Common;

use Exception;
use Jam18\BehavioralTemplates\Command\Actions\AbstractAction;
use Jam18\BehavioralTemplates\Command\Interfaces\ICommand;
use Monolog\Logger;

class Command implements ICommand
{
    private string $backup;
    private string $text;

    public function __construct(
        private AbstractAction $action,
        private Logger $logger
    )
    {
        $this->text = $this->action->getText();
        $this->backup = $this->action->getText();
    }

    function execute(): ?string
    {
        try{
            $this->backup = $this->action->getText();
            $result = $this->action->doAction();
            $this->text = $this->action->getText();
            $this->logger->info('command was done. New text: ' . $this->text . '. Result: ' . $result);
            return $result;
        }
        catch (Exception $exception)
        {
            $this->logger->error('command was ended with error: ' . $exception->getMessage());
            return null;
        }
    }

    function cancel(): string
    {
        $this->text = $this->backup;
        return $this->backup;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}