<?php

#
# str_starts_with
#
$id = 'inv_sdflksdnfklsdjkf';   // from API response

// vanilla php
$result = stripos($id, 'inv_') === 0;

var_dump($result);

//php8
$result = str_starts_with($id, 'inv_');

var_dump($result);

echo '==========='."\n";

#
# str_ends_with
#

$id = 'sdflksdnfklsdjkf_inv';   // from API response

// vanilla php
$result = stripos(strrev($id), strrev('_inv')) === 0;

var_dump($result);
var_dump(!! preg_match('/_inv$/', $id)); // another way

//php8
$result = str_ends_with($id, '_inv');

var_dump($result);

echo '==========='."\n";

#
# str_contains
#
$url = 'https://example.com?foo=bar';

// vanilla php
var_dump(parse_url($url)['query']);

// or
var_dump(strpos($url, '?') !== false);

// php8 way

var_dump(str_contains($url, '?'));