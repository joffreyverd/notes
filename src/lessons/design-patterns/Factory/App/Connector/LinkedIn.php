<?php namespace App\Connector;

use App\Connector\Interface;

class LinkedIn implements Interface\ISocialNetwork
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Login with user $this->email and password $this->password\n";
    }

    public function logOut(): void
    {
        echo "Login with user $this->email";
    }

    public function createPost($content): void
    {
        echo "Created post on LinkedIn \n";
    }
}
