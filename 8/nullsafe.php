<?php

/**
 * Nullsafe oparator
 */

class User
{
    public function profile()
    {
        return new Profile;
//        return null;
    }
}

class Profile
{
    public function employment()
    {
        return 'web developer';
    }
}

$user = new User;

//var_dump($user->profile()->employment()); // "web developer" if profile() return new Profile

// but if profile() returns null (from db for example) that will be a fatal error and we need to check for null:

/*
$profile = $user->profile();
if ($profile) {
    echo $profile->employment();
}
*/

// and a short version of this is "the null safe operator"
//var_dump($user->profile()?->employment());

// the real world example
echo $user->profile()?->employment() ?? 'Not Provided';
