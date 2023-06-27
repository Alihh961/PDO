<?php

namespace App\Model;

use DateTime;


class Movie
{

    private string $title;
    private DateTime $releaseDate;

    public function getName(): string
    {
        return $this->title;
    }

    public function settitle(string $title): void
    {
        $this->title = $title;
    }

    public function getReleaseDate(): Datetime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(Datetime $releaseDate): void
    {
        $this->releaseDate;
    }
}
