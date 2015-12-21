@extends('app')

@section('content')
<div class="container" style="height:77%; width:90%;">
        <div class="alert alert-warning" style="display:none;" id="mywarn">
            Place selected is not a restaurant!
        </div>
    <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
        <div id="map"></div>
    <br></br>
    <form class="form-inline right" method="POST" action="addbooking" onsubmit="return validate_form()" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" id="place_name" name="place_name" style="display:none;">
        <input type="text" id="location" name="location" style="display:none;">
        <input type="text" id="phone" name="phone" style="display:none;">
        <div class="form-group">
            <label>Number of people:</label>
            <input type="number" min="1" max="16" class="form-control" name="nofppl" required = "required">
        </div>
        <div class="form-group">
            <label>Date:</label>
            <input placeholder="dd/mm/yy" type="date" class= "form-control" name="date" required = "required">
        </div>
        <div class="form-group">
            <label>Time:</label>
            <input type=time max=21:00 min=12:00 step=3600 class="form-control" name="time" required = "required">
        </div>
        <input type="submit" id="btn-book" class="btn btn-warning" value="Book!">
    </form>
<br><br>
</div>
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #map {
        height: 100%;
    }
.controls {
    margin-top: 10px;
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 32px;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 300px;
}

#pac-input:focus {
    border-color: #4d90fe;
}

.pac-container {
    font-family: Roboto;
}

#type-selector {
    color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

    </style>
<script>
// This sample uses the Place Autocomplete widget to allow the user to search
// for and select a place. The sample then displays an info window containing
// the place ID and other information about the place that the user has
// selected.
var placetypes = [];
var googlemaps_id = "";
var location_place = "";
var phone_number_place = "";
var name_place = "";
function validate_form()
{
  is_res = false;
  for(i=0;i<placetypes.length;i++)
  {
    if(placetypes[i]=="restaurant")
    {
      is_res = true;
      break;
    }
  }
  if(!is_res)
  {
    $("#mywarn").show();
    return is_res;
  }
  else
  {
    $("#gmaps_id").val(googlemaps_id);
    $("#place_name").val(name_place);
    $("#location").val(location_place);
    $("#phone").val(phone_number_place);
    return is_res;
  }
}
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 19.0759837, lng: 72.8776559},
    zoom: 13
  });

  var input = document.getElementById('pac-input');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    // Set the position of the marker using the place ID and location.
    marker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location
    });
    marker.setVisible(true);

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
      'Address : ' + place.formatted_address + '<br>' +
      'Phone no: ' + place.formatted_phone_number+ '<br>');
    infowindow.open(map, marker);
    placetypes = place.types;
    googlemaps_id = place.place_id;
    location_place = place.formatted_address;
    phone_number_place = place.formatted_phone_number;
    name_place = place.name;
    console.log(googlemaps_id+"  "+placetypes);
  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEPiIPDy7aBXOq7guktYv47dNGzTq2DkI&libraries=places&signed_in=true&callback=initMap"
async defer></script>
@endsection
