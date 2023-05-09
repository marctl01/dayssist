<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Calendar;
use App\Helpers\CalendarDate;
use App\Helpers\CurrentDate;


class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index($monthName)
    {
        $calendar = new Calendar(new CurrentDate, new CalendarDate);
        $calendar->setSundayFirst(false);
        $months = $calendar->getMonthLabels();
        $monthNumber = array_search($monthName, $months) + 1;
        $calendar->setMonth($monthNumber);
        $calendar->create();

        return view('calendar', compact('calendar'));
    }
}
