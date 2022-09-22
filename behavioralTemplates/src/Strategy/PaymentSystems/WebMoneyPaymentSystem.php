<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Strategy\PaymentSystems;

use Jam18\BehavioralTemplates\Strategy\Interfaces\IPaymentSystem;

class WebMoneyPaymentSystem implements IPaymentSystem
{

    function pay(float $sum, string $phoneNumber): void
    {
       echo "payment was accept, please wait. Your WebMoney";
    }
}