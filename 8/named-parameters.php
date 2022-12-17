<?php

// old way

class Invoice7
{
    private $description;
    private $total;
    private $date;
    private $paid;

    public function __construct($description, $total, $date, $paid)
    {
        $this->description = $description;
        $this->total = $total;
        $this->date = $date;
        $this->paid = $paid;
    }
}

$invoice7 = new Invoice7(
    'Customer installation',
    10000,
    new DateTime,
    true
);

// php8 way

class Invoice8
{
    public function __construct(
        private $description,
        private $total,
        private $date,
        private $paid
    )
    {
    }
}

$invoice8 = new Invoice8(
    description: 'Customer installation',
    total: 10000,
    date: new DateTime,
    paid: true
);


var_dump($invoice8);
