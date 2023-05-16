<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Calendar;
use App\Helpers\CalendarDate;
use App\Helpers\CurrentDate;


class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $calendar = new Calendar(new CurrentDate, new CalendarDate);

        $calendar->setSundayFirst(false);
        $calendar->create();

        return view('dashboard', compact('calendar'));
    }
}
