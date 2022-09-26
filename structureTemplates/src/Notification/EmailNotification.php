<?php
declare(strict_types=1);

namespace Jam18\StructureTemplates\Notification;

use Jam18\StructureTemplates\Interfaces\INotification;

class EmailNotification implements INotification
{

    public function __construct()
    {
    }

    function notify(): void
    {
        echo "Email Notification was done.\n";
    }
}