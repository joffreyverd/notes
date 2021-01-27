<?php

require_once('vendor/autoload.php'); 
use App\Repository;
use App\Helper;

$userRepo = new Repository\User();
// Logger observer subscribed to every events of the User Repository subject
$userRepo->attach(new Helper\Logger);
// Notification observer subscribed to a single event of the User Repository subject
$userRepo->attach(new Helper\Notification,'users:created');

$user = $userRepo->create([
    'name' => 'Charlie',
    'email' => 'charlie@gmail.com',
]);
$userRepo->delete($user);
