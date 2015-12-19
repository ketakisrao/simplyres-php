@extends('app')

@section('content')
<div class="container">
	<div class="row">
        <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
        <div id="map"></div>
	</div>
</div>
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
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBuCmbMEyBhm1J7CgKiJBKMK8SjKNyfJjg&libraries=places&signed_in=true&callback=initMap"
async defer></script>
@endsection
