<?php

namespace App\Helpers;

use DateTime;

class CalendarDate extends DateTime
{
    use DateHelpers;

    public function __construct()
    {
        parent::__construct();
        $this->modify('first day of this month');
    }

    public function getMonthStartDayOfWeek()
    {
        return (int) $this->format('N');
    }
}
