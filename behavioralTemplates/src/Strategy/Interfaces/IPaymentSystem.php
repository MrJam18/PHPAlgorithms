<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Strategy\Interfaces;


interface IPaymentSystem 
{
    function pay(float $sum, string $phoneNumber): void;
}