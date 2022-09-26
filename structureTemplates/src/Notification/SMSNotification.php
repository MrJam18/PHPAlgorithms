<?php
declare(strict_types=1);

namespace Jam18\StructureTemplates\Notification;

use Jam18\StructureTemplates\Interfaces\INotification;

class SMSNotification implements INotification
{
    public function __construct(private INotification $notification)
    {

    }

    function notify():void
    {
        echo "SMS Notification was done.\n";
        $this->notification->notify();
    }
}