<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Strategy\PaymentSystems;

use Jam18\BehavioralTemplates\Strategy\Interfaces\IPaymentSystem;

class QiwiPaymentSystem implements IPaymentSystem
{

    function pay(float $sum, string $phoneNumber): void
    {
        $result = false;
       if($this->handlePayment($sum)) $result = $this->confirmPhone($phoneNumber);
       if($result) $this->notifySuccess($phoneNumber);
    }

    private function handlePayment($sum): bool
    {
        if($sum > 0) return true;
        return false;
    }

    private function confirmPhone(string $phoneNumber): bool
    {
        if(preg_match('/^[0-9]{11}+$/', $phoneNumber))
        {
            return true;
        }
        return false;
    }

    private function notifySuccess(string $phoneNumber):void
    {
        echo "to the phone number $phoneNumber was sent message about success payment by Qiwi payment system";
    }



}