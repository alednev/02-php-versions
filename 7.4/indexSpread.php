<?php

function addCommon($a, $b)
{
    return $a + $b;
}

var_dump(addCommon(2, 4));

function addDynamic() {
    return array_sum(func_get_args()); // func_get_args returns array of all arguments passed to function
}

var_dump(addDynamic(2, 4, 5));

// but you might pass not only digits to addDynamic function:
var_dump(addDynamic(4, 3, [], false, 'dddddd', null)); // and result may not be right

// so welcome to spread operator
function addSpread(...$numbers)
{
    return array_sum($numbers);
}

var_dump(addSpread(4, 4, 4)); // ok
var_dump(addSpread(4, 4, 4, [], null)); // ok ...?

// and we can add type to spread operator
function addSpreadStrict(int ...$numbers)
{
    return array_sum($numbers);
}

//var_dump(addSpreadStrict(4, 4, 4, [], null)); // fatal error - what we needed

// ===============

$array = [[1,2], [3,4], 5, [6,7]]; // nested array
$array2 = [...[1,2], ...[3,4], 5, ...[6,7]]; // unpacked to one array ... (what?)

var_dump($array, $array2);

// ===============

// unpacking in functions
// where $numbers always will be an array
function addUnpack($current = 0, int ...$numbers) {
    return array_sum([$current, ...$numbers]);      // magic here )))
}

var_dump(addUnpack(3, 4, 3));