<?php namespace App\Helper;

class Logger implements \SplObserver
{
    const FILE = __DIR__ . '/log.txt';

    public function update(\SplSubject $repository, string $event = null, $data = null): void
    {
        // $entry = date('Y-m-d H:i:s') . ": '$event' with data '" . json_encode($data) . "'\n";
        // file_put_contents($self::FILE, $entry, FILE_APPEND);

        echo "Logger catched the event '$event'.\n";
    }
}
