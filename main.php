<?php
require_once __DIR__ . '/vendor/autoload.php';
use src\UserTableWrapper;

$user = new UserTableWrapper();
$user->insert(['Bob', 2]);
$user->insert(['Tom', 3]);

print_r($user->get());
print_r($user->update(3, ['Bill', 1]));

$user->delete(2);

print_r($user->get());