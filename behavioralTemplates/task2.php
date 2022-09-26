<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

$paymentSystemName = $argv[1] ?? null;
$phone = $argv[2] ?? 'unknown';
$sum = (float)($argv[3] ?? '0');

try {
    $paymentSystem = "Jam18\BehavioralTemplates\Strategy\PaymentSystems\\$paymentSystemName" . 'PaymentSystem';
    if(!class_exists($paymentSystem)) throw new Exception('this payment system not exists');
    $paymentSystem = new $paymentSystem;
    $paymentSystem->pay($sum, $phone);
} catch (Exception $exception) {
    echo $exception->getMessage();
}
