<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $events = array();
        $reservations = Reservation::all();
        foreach ($reservations as $reservation) {
            $events[] = [
                'title' => $reservation->title,
                'start' => $reservation->start_time,
                'end' => $reservation->end_time,
            ];
        }
        return view('calendar.index', ['events' => $events]);
    }
}
