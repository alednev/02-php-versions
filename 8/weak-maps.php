<?php

// old way
$obj = new stdClass();

$store = new SplObjectStorage();

$store[$obj] = 'foobar';

var_dump($store);

unset($obj);

var_dump($store); // object is still there - gc failed

// weak maps solve these problems

$obj = new stdClass();

$map = new WeakMap(); // some kind of array, but keys are objects(!)

$map[$obj] = 'foobar';

var_dump($map);

unset($obj);

var_dump($map); // object is gone - gc doing well

echo '====================' . "\n";

interface Event
{
}

class SomeEvent implements Event
{
}

class AnotherEvent implements Event
{
}

class Dispatcher
{
    protected WeakMap $dispatcherCount;

    public function __construct()
    {
        $this->dispatcherCount = new WeakMap();
    }

    public function dispatch(Event $event)
    {
        // old way
//        $this->dispatchOld($event);

        // new way
        $this->dispatchNew($event);
    }

    protected function dispatchOld(Event $event)
    : void {
        // initiate value in array
        if (!isset($this->dispatcherCount[$event])) {
            $this->dispatcherCount[$event] = 0;
        }

        $this->dispatcherCount[$event]++;

        // dispatch the event
    }

    protected function dispatchNew(Event $event)
    {
        $this->dispatcherCount[$event] ??= 0; // fully replace old initialization
        $this->dispatcherCount[$event]++;

        // dispatch the event
    }
}

$dispatcher = new Dispatcher();

$event = new SomeEvent();
$dispatcher->dispatch($event);
$dispatcher->dispatch($event);
$dispatcher->dispatch($event);

$anotherEvent = new AnotherEvent();
$dispatcher->dispatch($anotherEvent);
$dispatcher->dispatch($anotherEvent);

var_dump($dispatcher);