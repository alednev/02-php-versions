<?php

// dynamic auto-type or not
declare(strict_types=0);

/**
 * scalar typehints
 */

function setAge(int $age)
{
    var_dump($age);
}

setAge('30');   // int(30)

function setIsValid(bool $value)
{
    var_dump($value);
}

setIsValid(true);       //true
setIsValid(1);          //true
setIsValid(-1);         //true
setIsValid('sasasas');  // true
//setIsValid([]);           // error

echo '=======================' . PHP_EOL;

/**
 * return type declarations
 */
interface SomeInterface
{
    public function getUser()
    : User;
}

class User
{
}

// right way
class SomeClass implements SomeInterface
{
    function getUser()
    : User
    {
        return new User;
    }
}

var_dump((new SomeClass())->getUser()); // object

// wrong way
function getUser()
: User
{
    return []; // error when be called
}

echo '=======================' . PHP_EOL;

/**
 * Spaceship <=>
 */

$games = ['Mass Effect', 'Super Mario Bros', 'Zelda', 'Fallout', 'Metal Gear'];

// usual sort
//sort($games);

// sorting with spaceship operator

// reproduce usual sort
usort($games, function ($a, $b) {
    var_dump('a: ' . $a . ', b: ' . $b);

    return $b <=> $a;   // последовательно проверяется и возвращается -1, 0, 1 между $b и $a
});

var_dump($games);

// sort by length
usort($games, function ($a, $b) {
    return strlen($a) <=> strlen($b);   // последовательно проверяется и возвращается -1, 0, 1 между $b и $a
});

var_dump($games);

class UserSort
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;
    }

    public function name()
    {
        return $this->name;
    }

    public function age()
    {
        return $this->age;
    }
}

class UserSortCollection
{
    protected $users = [];

    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function sortBy(string $property)
    {
        usort($this->users, function ($userOne, $userTwo) use ($property) {
            return $userOne->$property() <=> $userTwo->$property();
        });
    }

    public function users()
    : array
    {
        return $this->users;
    }
}

$collection = new UserSortCollection([
    new UserSort('Jeff', 30),
    new UserSort('Taylor', 29),
    new UserSort('Jane', 50),
    new UserSort('Susie', 10),
]);

$collection->sortBy('age');

var_dump($collection->users());

echo '=======================' . PHP_EOL;

/**
 * The Null Coalesce Operator ??
 */

$_GET['name'] = 'Joe';

//$name = isset($_GET['name']) ? $_GET['name'] : 'nothing';

// we can rewrite this to

$name = $_GET['name'] ?? 'nothing';

var_dump($name);

echo '=======================' . PHP_EOL;

/**
 * Grouped Imports
 *
 * before:
 *
 * use App\Person;
 * use App\Animal;
 *
 * now:
 *
 * use App\{Person, Animal}
 */


/**
 * Anonymous Classes
 */

interface Logger
{
    public function log($message);
}

class TerminalLogger implements Logger
{
    public function log($message)
    {
        var_dump($message);
    }
}

class Application
{
    protected $logger;

    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function action()
    {
        $this->logger->log('Doing things');
    }
}

$app = new Application;
// $app->setLogger(new TerminalLogger); // old way

// anonymous class
$app->setLogger(new class implements Logger {
    public function log($message)
    {
        var_dump($message);
    }
});

$app->action();