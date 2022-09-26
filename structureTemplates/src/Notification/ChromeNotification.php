<?php
declare(strict_types=1);

namespace Jam18\StructureTemplates\Notification;

use Jam18\StructureTemplates\Interfaces\INotification;

class ChromeNotification implements INotification
{
    public function __construct(private INotification $notification)
    {
    }


    function notify(): void
    {
        echo "Chrome notification was done.\n";
        $this->notification->notify();
    }
}