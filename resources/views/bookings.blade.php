@extends('app')

@section('content')
<H1>Congratulations on your first Laravel page!!</H1>
  <div class="container" >
    <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>Restaurant Name</th>
            <th>Location</th>
            <th>Date</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          @foreach($bookings as $booking)
          <tr>
            <td>{{$booking->restaurant_name}}</td>
            <td>{{$booking->location}}</td>
            <td>{{$booking->date}}</td>
            <td>{{$booking->time}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <p>You do not have any bookings, <strong>Make your first one now by clicking on dashboard!</strong><p>
    </div>
@endsection