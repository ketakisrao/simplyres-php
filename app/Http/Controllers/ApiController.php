<?php namespace App\Http\Controllers;
use Input;
use App\Booking;
class HomeController extends Controller {
    
    public function displayBookings()
    {
        $bookings = Booking::all();
        return $bookings;
    }
}