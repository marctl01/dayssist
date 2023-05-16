<?php

namespace App\Helpers;

use Hamcrest\Core\Set;

trait DateHelpers
{
    public function getMonthNumberDays()
    {
        return (int) $this->format('t');
    }

    public function getCurrentDayNumber()
    {
        return (int) $this->format('j');
    }

    public function getMonthNumber()
    {
        return (int) $this->format('m');
    }

    public function getMonthName()
    {
        return $this->format('M');
    }

    public function getYear()
    {
        return $this->format('Y');
    }
}
