<?php namespace App\Repository;

use App\Model;

class User implements \SplSubject
{
    private $users = [];
    private $observers = [];

    public function __construct()
    {
        // A special event group for observers that want to listen to all events
        $this->observers['*'] = [];
    }

    private function initEventGroup(string $event = '*'): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = '*'): array
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers['*'];

        return array_merge($group, $all);
    }

    public function attach(\SplObserver $observer, string $event = '*'): void
    {
        $this->initEventGroup($event);
        $this->observers[$event][] = $observer;
    }

    public function detach(\SplObserver $observer, string $event = '*'): void
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    public function notify(string $event = '*', $data = null): void
    {
        echo "'$event' event happened.\n";
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }

    public function create(array $data): Model\User
    {
        echo "Creating a user.\n";

        $user = new Model\User;
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(['id' => $id]);
        $this->users[$id] = $user;

        $this->notify('users:created', $user);

        return $user;
    }

    public function update(Model\User $user, array $data): ?Model\User
    {
        echo "Updating a user.\n";

        $id = $user->attributes['id'];
        if (!isset($this->users[$id])) {
            return null;
        }

        $user = $this->users[$id];
        $user->update($data);

        $this->notify('users:updated', $user);

        return $user;
    }

    public function delete(Model\User $user): void
    {
        echo "Deleting a user.\n";

        $id = $user->attributes['id'];
        if (!isset($this->users[$id])) {
            return;
        }

        unset($this->users[$id]);

        $this->notify('users:deleted', $user);
    }
}
