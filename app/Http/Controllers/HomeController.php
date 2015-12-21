<?php namespace App\Http\Controllers;
use Input;
use App\Booking;
use App\Http\Request;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $today = date("Y-m-d");
		return view('home',['today' => $today]);
	}
    
    public function bookings()
    {
        $username = \Auth::user()->name;
        $bookings = Booking::where('username', $username)
               ->take(10)
               ->get();
        return view('bookings',['bookings' => $bookings]);
    }
    
    public function delbooking()
    {
        $data = Input::get('booking_id');
        $deletedRows = Booking::where('id', $data)->delete();
        if($deletedRows>0)
            return $data;
        else
            return -1;
    }
    
    public function addbooking()
    {
        $booking = new Booking;
        $booking->restaurant_name = Input::get('place_name');
        $booking->username = \Auth::user()->name;
        $booking->time = Input::get('time');
        $booking->date = Input::get('date');
        $booking->location = Input::get('location');
        $booking->save();
        return redirect('bookings');
    }
    
    public function display_bookings()
    {
        $bookings = Booking::all();
        return Response::json(array('User' => $bookings, 'status_code'=> 200));
    }
}