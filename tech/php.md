```php

// ---------------------- Usage of classes ----------------------

class Tuto
{
    // Primitive types in PHP functions (parameters and returns)
    // Enhance performances and reduce errors

    /**
     * @param string
     * @return bool|null
     */
    public function updateApproval(string $when): ?bool
    {
        // $when will be necessarily a string
        // This function will be forced to return a boolean
        return true;
    }
}

class QC
{
    const UNRELATED = 0;
    const PENDING = 1;
    const VALIDATED = 2;
    const REFUSED = 3;
}

echo QC::PENDING;

    /**
     * @param mixed Can be a string, int, array, etc
     * @return bool Return true or false
     */
    function mixedParam(mixed $id): bool
    {
        return true;
    }

// ---------------------- Forms ----------------------

// Unset à post value from a form
unset($_POST['value']);

// ---------------------- Print data ----------------------

// Usefull to echo php values in html
$value = 'lol';
echo '<code><pre>' . print_r($value) . '</pre></code>';

// Prettify arrays
print('<pre>' . print_r($values, true) . '</pre>');

// ---------------------- Manipulate data ----------------------

// Usefull to extract data in a multi-level array and
// put it inside a new one without be forced to iterate with a foreach
$formattedIdImages = array_column($idImages, 'idimage');

// Format a multi-level array with only one entry
$firstArray = [
    0 => [
        'hello' => 1,
        'world' => 2
    ]];
$secondArray = array_shift($firstArray); // return ['lol' => 1, 'hello' => 2]

// Know difference between two arrays
$keyToRemove = ['idoptions', 'idpractice'];
$columns = array_diff($columnsNames, $keyToRemove);

// Push in attachments every attachments iteration with an 'idattachment' present in the $qc
$attachments = array_filter($attachments, function ($attachment) use ($qc) {
    return in_array($attachment['idattachment'], $qc) ? true : false;
});


// Return the numeric value -> usefull to avoid sql injections
intval($_POST['data']);

// Get the current date time
$date = new \DateTime('now');

// Delete a key-value from an associative array
$array = [
    ['idUser' => 1],
    ['idUser' => 2],
    ['idUser' => 3]
];
$key = array_search('1', array_column($array, 'idUser'));
unset($array[$key]);

// Instead of that:
$ids = [];
foreach ($files as $file) {
    array_push($array, $file->id);
}
// Do that:
$ids = array_map(function ($file) {
    return $file->id;
}, $files);
// And with PHP 7.4 (arrow function):
$ids = array_map(fn($file) => $file->id, $files);

// ---------------------- Return types ----------------------

// Ternary condition
return ($attachments ? $attachments : []);

// If $users exist, return $users. If not, return an empty array
return $users ?? [];

// Both have the same meaning and return the same value
return CONSTANT === CONSTANTTWO ? true : false;
return CONSTANT;

// If both are equals, return true
return $idUser == $id;

// return false if $user is empty, null, false or 0
if (!$user) {
    return false;
}

// ---------------------- Performance test ----------------------

$i = 0;
$time_start = microtime(true);
do {
    $userRepo = new App\UserRepo($entityManager);
    $user = $userRepo->find(56);
    $i++;
} while ($i < 100);
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Took $time seconds\n to retrieve $i practice objects with Doctrine 2 \n";
die();

// ---------------------- Functions ----------------------

// anonymous function
$returnFunction = function ($value) {
    return strtoupper($value);
};
echo $returnFunction('good morning');

// anonymous function as callback of another function
$images = array_map(function ($image) {
    return $image->id;
}, $imagesObjects);
