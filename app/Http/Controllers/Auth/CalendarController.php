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
    public function index()
    {
    
        $calendar = new Calendar(new CurrentDate, new CalendarDate);
        $calendar->create();
        $calendar->setSundayFirst(false);

        return view('calendar', compact('calendar'));
    }
}