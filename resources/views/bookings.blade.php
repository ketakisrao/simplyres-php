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
          @foreach
          <tr>
            <td>{{$bookings->restaurant_name}}</td>
            <td>{{$bookings->location}}</td>
            <td>{{$bookings->date}}</td>
            <td>{{$bookings->time}}</td>
          </tr>
          {% endfor %}
        </tbody>
      </table>
    </div>

    <p>You do not have any bookings, <strong>Make your first one now by clicking on dashboard!</strong><p>
    </div>
@endsection