```php

// Get the complete Doctrine Object
$user = Doctrine_Core::getTable('User')->find(246);

// Get the complete Doctrine Object looking by other field than primary key
$user = Doctrine_Core::getTable('User')->findOneBy('login', 'jverd@protonmail.com');

// Update values in database
$request = Doctrine_Query::create()
    ->update('User')
    ->set('name', $_POST['name'])
    ->Where('login = ' . $_POST['login'])
    ->andWhere('password = ' . $_POST['password'])
    ->execute();

// Transform the doctrine object into an array
$request->fetchArray();

// Another way the save much more easier
$user->set('status', 1)->save();

// Join tables between them
$attachments = Doctrine_Query::create()
    ->select('u.name, c.name')
    ->from('User u')
    ->leftJoin('u.company c')
    /*Contain test*/
    ->where('u.status LIKE ? ', "%$condition%")
    /*If a value exists in an array*/
    ->whereIn('c.id', $ids)
    ->fetchArray();

// get sql query
$query = \Doctrine_Query::create()
    ->select('id')
    ->from('User')
    ->where('login LIKE "%' . 'jverd@protonmail.' . '%"');
echo $query->getSqlQuery();

// Retrieve the column names of the targeted table
$columnsNames = Doctrine_Core::getTable('User')
    ->getColumnNames();

// Get the entiere associate object
$case = Doctrine_Core::getTable('User')
    ->find($_REQUEST['companyId'])
    ->get('Company');
