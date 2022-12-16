<?php

/**
 * Null Coalescing Assignment Operator
 */

// maybe from some api
$user = [
    'name' => [
//        'first' => 'joe',
        'last'  => 'doe',
    ]
];

// but, what if api didn't send the first name?

// common usage
//$user['name']['first'] = isset($user['name']['first']) ? $user['name']['first'] : 'Not provided';

// null coalesce operator
//$user['name']['first'] = $user['name']['first'] ?? 'Not provided';

// Null Coalescing Assignment Operator
$user['name']['first'] ??= 'Not provided';

var_dump($user);

// conclusion: syntax sugar
