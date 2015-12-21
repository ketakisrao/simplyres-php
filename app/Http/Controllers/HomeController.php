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
		return view('home');
	}
    
    public function bookings()
    {
        $username = "Ketaki Rao";//Auth::user()->name;
        $bookings = Booking::where('username', $username)
               ->take(10)
               ->get();
        return view('bookings',['bookings' => $bookings]);
    }
    
    public function delbooking()
    {
        if(Request::ajax()){
            return Response::json(Request::all());
    }
        return "Bad choice";
    }
}