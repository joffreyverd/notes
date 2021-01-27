<?php namespace App\Connector\Interface;

interface ISocialNetwork
{
    public function logIn(): void;

    public function logOut(): void;

    public function createPost($content): void;
}
