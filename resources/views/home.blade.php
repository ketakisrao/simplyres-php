@extends('app')

@section('content')
  <div class="container"  style="height:80%; width:90%;">
    <div class="alert alert-warning" style="display:none;" id="mywarn">
      Place selected is not a restaurant!
    </div>
    <input id="pac-input" class="controls" type="text"
    placeholder="Enter a location">
    <div id="map"></div>
    <!-- <a id="btn-book" class=" btn btn-sm btn-primary right"> -->
    <form class="form-inline right" method="POST" action="" onsubmit="return validate_form()" >
      <input type="text" id="gmaps_id" name="gmaps_id" style="display:none;">
      <input type="text" id="place_name" name="place_name" style="display:none;">
      <input type="text" id="location" name="location" style="display:none;">
      <input type="text" id="phone" name="phone" style="display:none;">
      <div class="form-group">
        <label>Number of people:</label>
        <input type="number" min="1" max="16" class="form-control" name="nofppl" required = "required">
      </div>
      <div class="form-group">
        <label>Date:</label>
        <input placeholder="dd/mm/yy" type="date" min={{ date }} class="form-control" name="date" required = "required">
      </div>
      <div class="form-group">
        <label>Time:</label>
        <input type=time max=21:00 min=12:00 step=3600 class="form-control" name="time" required = "required">
      </div>
      <input type="submit" id="btn-book" class="btn btn-warning" value="Book!">
    </form>
  </div>
@endsection
