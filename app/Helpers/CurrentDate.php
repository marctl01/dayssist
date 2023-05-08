<?php

namespace App\Helpers;

use DateTimeImmutable;

class CurrentDate extends DateTimeImmutable
{
    use DateHelpers;

    public function __construct()
    {
        parent::__construct();
    }
}
