<?php
declare(strict_types=1);


use Model\Repository\Product;
use Model\Repository\User;

require_once '../vendor/autoload.php';


$usersRepository = new User();
$data = $usersRepository->getById(2);
$data = $usersRepository->getByLogin('doejohn');
print_r($data);

$productRepository = new Product();
$productRepository->search([1, 2]);
$data = $productRepository->fetchAll();
print_r($data);


