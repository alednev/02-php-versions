<?php

/**
 * For php 5
 */

class User5
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Plan5
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Signup5
{
    protected User5 $user;

    Protected Plan5 $plan;

    public function __construct(User5 $user, Plan5 $plan)
    {
        $this->user = $user;
        $this->plan = $plan;
    }
}

$user5 = new User5('john_doe');
$plan5 = new Plan5('monthly');

//var_dump(new Signup5($user5, $plan5));

/**
 * but for php 8 we can do this:
 */

class User8
{
    public function __construct(protected string $name)
    {
    }
}

class Plan8
{
    public function __construct(protected string $name = 'monthly')
    {
    }
}

class Signup8
{
    public function __construct(protected User8 $user, protected Plan8 $plan)
    {
    }
}

$user8 = new User8('john_doe');
$plan8 = new Plan8();

var_dump(new Signup8($user8, $plan8));