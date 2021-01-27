<?php

require_once('vendor/autoload.php'); 
use App\Poster;

$message = 'Hello world';
$socialNetworks = [
    'Facebook' => new Poster\Facebook('charlie', '******'),
    'LinkedIn' => new Poster\LinkedIn('charlie@gmail.com', '******'),
];

foreach ($socialNetworks as $name => $network) {
    echo "$name concrete creator:\n";
    $network->post($message);
    echo "\n\n";
}
