<?php namespace App\Poster;

use App\Poster;
use App\Connector;

// Inherits method `post` from the parent class
class Facebook extends Poster\SocialNetwork
{
    private $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getSocialNetwork(): Connector\Interface\ISocialNetwork
    {
        return new Connector\Facebook($this->login, $this->password);
    }
}
