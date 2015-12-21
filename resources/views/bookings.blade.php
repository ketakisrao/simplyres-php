@extends('app')

@section('content')
  <div class="container" >
      @if(count($bookings)>0)
            <div class="table-responsive">          
              <table class="table">
                <thead>
                  <tr>
                    <th>Restaurant Name</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Time</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($bookings as $booking)
                  <tr>
                    <td>{{$booking->restaurant_name}}</td>
                    <td>{{$booking->location}}</td>
                    <td>{{$booking->date}}</td>
                    <td>{{$booking->time}}</td>
                    <td><form id='{{$booking->id}}' action="#"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button type="submit"  class="btn-primary btn-xs">Cancel</button></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
      @else
            <p>You do not have any bookings, <strong>Make your first one now by clicking on Home!</strong></p>
      @endif
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});
      $('form').submit(function(e){
          e.preventDefault();
          $.post('delbook', {booking_id : $(this).attr("id")}, function(data){
              console.log(data);
          });
      }); 
});
</script>
@endsection