<?php namespace App\Helper;

class Notification implements \SplObserver
{
    const ADMIN_EMAIL = 'admin@gmail.com';

    public function update(\SplSubject $repository, string $event = null, $data = null): void
    {
        // mail($self::ADMIN_EMAIL,
        //     "Onboarding required",
        //     "We have a new user. Here's his info: " .json_encode($data));
        echo "Notification catched the event '$event'.\n";
    }
}
