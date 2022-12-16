<?php

use Illuminate\Support\Collection;

class SeriesCollection extends Collection
{
    public function firstByTitle($title)
    {
        return $this->first(function ($series) use ($title) {
            return $series->title === $title;
        });
    }

    public function firstByTitleArrow($title)
    {
        // no need to pass $title to arrow function - fn already has access to it
        return $this->first(fn ($series) => $series->title === $title);
    }
}