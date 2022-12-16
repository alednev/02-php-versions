<?php

require "vendor/autoload.php";

$series = collect([
    new Series('php series'),
    new Series('php series 2'),
]);

$series->each(function ($s) {
    $s->title = ucwords($s->title);
});

// short arrow function (absolutely identical to upper version) but only for single line
$series->each(fn($s) => $s->title = ucwords($s->title));

//$series = $series->map(function($s){
//    return $s->title;
//});

// and short version

//$series = $series->map(fn($s) => $s->title);

//var_dump($series);

// =============================

$series = new SeriesCollection([
    new Series('php series'),
    new Series('php series 2'),
]);

var_dump($series->firstByTitle('php series 2'));
var_dump($series->firstByTitleArrow('php series 2'));
