<?php
declare(strict_types=1);


function timingEcho(float $time, string $actionName): void {
    echo "$actionName - ".  number_format($time, 5) . " sec.\n";
}
