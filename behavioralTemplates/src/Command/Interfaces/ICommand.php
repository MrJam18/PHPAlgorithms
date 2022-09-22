<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Command\Interfaces;


interface ICommand 
{
    function execute(): ?string;
    function cancel(): string;
}