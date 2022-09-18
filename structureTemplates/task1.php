<?php
declare(strict_types=1);


use Jam18\StructureTemplates\Notification\ChromeNotification;
use Jam18\StructureTemplates\Notification\EmailNotification;
use Jam18\StructureTemplates\Notification\SMSNotification;

require_once '../vendor/autoload.php';

$notification = new ChromeNotification(
        new EmailNotification()
);

$notification->notify();
