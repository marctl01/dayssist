<?php

namespace App\Helpers;

class Calendar
{
    protected $currentDate;
    protected $calendarDate;

    protected $dayLabels = [
        'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'
    ];

    protected $monthLabels = [
        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre',
        'Noviembre', 'Diciembre'
    ];

    protected $sundayFirst = true;
    protected $weeks = [];

    public function __construct(CurrentDate $currentDate, CalendarDate $calendarDate)
    {
        $this->currentDate = $currentDate;
        $this->calendarDate = clone $calendarDate;
        $this->calendarDate->modify('first day of this month');
    }

    public function getDayLabels()
    {
        return $this->dayLabels;
    }

    public function getMonthLabels()
    {
        return $this->monthLabels;
    }

    public function SetSundayFirst($bool)
    {
        $this->sundayFirst = $bool;

        if(!$this->sundayFirst)
        {
            array_push($this->dayLabels, array_shift($this->dayLabels));
        }
    }

    public function setMonth($monthNumber)
    {
        $this->calendarDate->setDate($this->calendarDate->getYear(), $monthNumber, 1);
    }

    public function getCalendarMonth()
    {
        return $this->calendarDate->getMonthName();
    }

    public function getMonthFirstDay(){
        $day = $this->calendarDate->getMonthStartDayOfWeek();

        if($this->sundayFirst)
        {
            if($day === 7)
            {
                return 1;
            }

            if($day < 7)
            {
                return ($day + 1);
            }
        }

        return $day;
    }

    public function isCurrentDate($dayNumber)
    {
        if ($this->calendarDate->getYear() === $this->currentDate->getYear() &&
        $this->calendarDate->getMonthNumber() === $this->currentDate->getMonthNumber() &&
        $this->currentDate->getCurrentDayNumber() === $dayNumber)
        {
            return true;
        }
        return false;
    }

    public function isCurrentMonth($selectedMonth)
    {
        if ($this->calendarDate->getMonthName() === $selectedMonth)
        {
            return true;
        }
        return false;
    }

    public function getWeeks()
    {
        return $this->weeks;
    }

    public function create()
    {
        $days = array_fill(0, ($this->getMonthFirstDay() - 1), ['currentMonth' => false, 'dayNumber' => '']);

        //current days
        for($x = 1; $x <= $this->calendarDate->getMonthNumberDays(); $x++)
        {
            $days[] = ['currentMonth' => true, 'dayNumber' => $x];
        }

        $this->weeks = array_chunk($days, 7);

        //last month
        $firstWeek = $this->weeks[0];
        // var_dump($firstWeek);
        // exit;
        $prevMonth = clone $this->calendarDate;
        $prevMonth->modify('-1 month');
        $prevMonthNumDays = $prevMonth->getMonthNumberDays();

        for($x = 6; $x >= 0; $x--)
        {
            if(!$firstWeek[$x]['dayNumber']){
                $firstWeek[$x]['dayNumber'] = $prevMonthNumDays;
                $prevMonthNumDays -= 1;
            }
        }

        $this->weeks[0] = $firstWeek;

        //next month
        $lastWeek = $this->weeks[count($this->weeks) - 1];
        $nextMonth = clone $this->calendarDate;
        $nextMonth->modify('+1 month');

        $c = 1;
        for($x = 0; $x < 7; $x++)
        {
            if(!isset($lastWeek[$x]))
            {
                $lastWeek[$x]['currentMonth'] = false;
                $lastWeek[$x]['dayNumber'] = $c;
                $c++;
            }
        }

        $this->weeks[count($this->weeks) -1] = $lastWeek;
    }
}
