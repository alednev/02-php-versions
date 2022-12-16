<?php

/**
 * Symmetric array destructuring
 */

// common array
$book = ['The Title', 'Joe Johnson'];

//list($title, $author) = $book;
// or
[$title, $author] = $book; // that works

var_dump($title, $author);

echo PHP_EOL;

// associative array
$book = ['title' => 'The Title', 'author' => 'Joe Johnson'];

['title' => $title, 'author' => $author] = $book;

var_dump($title, $author);

echo PHP_EOL;

$books = [
    ['title' => 'The Martian', 'author' => 'Andy Weir'],
    ['title' => 'Harry Potter', 'author' => 'JK Rowling'],
];

foreach ($books as ['title' => $title, 'author' => $author]) {
    var_dump($title, $author);
}

echo '===================' . PHP_EOL;

/**
 * Nullable and Void types
 */
class User
{
    protected $age;

    public function age()
    : ?int
    {
        return $this->age;
    }

    public function subscribe(?callable $callback = null)
    : void {
        var_dump('subscribe here');

        if ($callback) {
            $callback();
        }
    }
}

$age = (new User)->age();

var_dump($age);

(new User)->subscribe(function () {
    var_dump('Respond here');
});

(new User)->subscribe(null);  // for ?callable method typehint

(new User)->subscribe();  // for $callback=null default value

echo '===================' . PHP_EOL;

/**
 * Multi-catch exception handling
 */
class ChargeRejected extends Exception {}

class NotEnoughFunds extends Exception {}

class UserEx {
    public function subscribe()
    {
//        var_dump('subscribing');
//        throw new ChargeRejected;
        throw new NotEnoughFunds;
    }
}

function flash($message)
{
    var_dump($message);
}

// old way
try {
    (new UserEx())->subscribe();
} catch (ChargeRejected $e) {
    flash('Failed');
} catch (NotEnoughFunds $e) {
    flash('Failed');
}

// new way
try {
    (new UserEx())->subscribe();
} catch (ChargeRejected | NotEnoughFunds $e) {
    flash('Failed');
}

echo '===================' . PHP_EOL;

/**
 * Iterables
 */

function dumpAll(iterable $items)
{
    foreach ($items as $item) {
        var_dump($item);
    }
}

class Collection implements IteratorAggregate
{
    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function getIterator()
    : ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}

$collection = new Collection(['one', 'two', 'three']);

dumpAll($collection);