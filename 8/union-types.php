<?php

class User
{
    // php7 union type (? = can be null)
    public function makeFriendsWith(?User $user)
    {
        var_dump('Yay friends');
    }

    // php7 doctypes
    /**
     * @param User|string $user
     */
    public function makeFriendsWith2($user)
    {
        var_dump('Yay friends 2');
    }

    // php8 union type - wo no docblock
    public function makeFriendsWith8(User|string $user)
    {
        var_dump('Yay friends 8');
    }
}

$joe = new User;
$sam = new User;

$joe->makeFriendsWith($sam);
$joe->makeFriendsWith2('sam@example.com');
$joe->makeFriendsWith8('sam@example.com');