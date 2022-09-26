<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Strategy\PaymentSystems;

use Exception;
use Jam18\BehavioralTemplates\Strategy\Interfaces\IPaymentSystem;

class YandexPaymentSystem implements IPaymentSystem
{

    /**
     * @throws Exception
     */
    function pay(float $sum, string $phoneNumber): void
    {
        $this->handlePayment($sum);
        $this->confirmPhone($phoneNumber);
        echo "yandex payment with sum $sum was successful";
    }

    /**
     * @throws Exception
     */
    private function handlePayment(float $sum): void
    {
        if($sum < 0) throw new Exception('sum was incorrect');
    }

    private function confirmPhone(string $phoneNumber): void
    {
        if(!preg_match('/^[0-9]{11}+$/', $phoneNumber)) throw new Exception("$phoneNumber is incorrect phone number");
    }

}