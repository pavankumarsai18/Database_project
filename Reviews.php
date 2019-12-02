<?php 
	include_once 'includes.php';
	session_start();
	//print_r($_SESSION);

?>

<!DOCTYPE HTML>
  <head>
    <style>
    #geomap{
    width: 100%;
    height: 400px;
    }
  </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
  </head>

  <body>
    <p>MAP</p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <form>
    <div class="form-group input-group">
      <input type="text" id="search_location" class="form-control" placeholder="Search location">
      <div class="input-group-btn">
          <button class="btn btn-default get_map" type="submit">
              Locate
          </button>
    </div>
    </div>
</form>

<!-- display google map -->
<div id="geomap"></div>

<!-- display selected location information -->
<h4>Location Details</h4>
<p>Address: <input type="text" class="search_addr" size="45"></p>
<p>Latitude: <input type="text" class="search_latitude" size="30"></p>
<p>Longitude: <input type="text" class="search_longitude" size="30"></p>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWVzvOW3pEdd6e-W4nOLTEd0QM9sxN0nE"></script>


    <script>
var geocoder;
var map;
var marker;

/*
 * Google Map with marker
 */
function initialize() {
    var initialLat = $('.search_latitude').val();
    var initialLong = $('.search_longitude').val();
    initialLat = initialLat?initialLat:36.169648;
    initialLong = initialLong?initialLong:-115.141000;

    var latlng = new google.maps.LatLng(initialLat, initialLong);
    var options = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("geomap"), options);

    geocoder = new google.maps.Geocoder();

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: latlng
    });

    google.maps.event.addListener(marker, "dragend", function () {
        var point = marker.getPosition();
        map.panTo(point);
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $('.search_addr').val(results[0].formatted_address);
                $('.search_latitude').val(marker.getPosition().lat());
                $('.search_longitude').val(marker.getPosition().lng());
            }
        });
    });

}

$(document).ready(function () {
    //load google map
    initialize();
    
    /*
     * autocomplete location search
     */
    var PostCodeid = '#search_location';
    $(function () {
        $(PostCodeid).autocomplete({
            source: function (request, response) {
                geocoder.geocode({
                    'address': request.term
                }, function (results, status) {
                    response($.map(results, function (item) {
                        return {
                            label: item.formatted_address,
                            value: item.formatted_address,
                            lat: item.geometry.location.lat(),
                            lon: item.geometry.location.lng()
                        };
                    }));
                });
            },
            select: function (event, ui) {
                $('.search_addr').val(ui.item.value);
                $('.search_latitude').val(ui.item.lat);
                $('.search_longitude').val(ui.item.lon);
                var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                marker.setPosition(latlng);
                initialize();
            }
        });
    });
    
    /*
     * Point location on google map
     */
    $('.get_map').click(function (e) {
        var address = $(PostCodeid).val();
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $('.search_addr').val(results[0].formatted_address);
                $('.search_latitude').val(marker.getPosition().lat());
                $('.search_longitude').val(marker.getPosition().lng());
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
        e.preventDefault();
    });

    //Add listener to marker for reverse geocoding
    google.maps.event.addListener(marker, 'drag', function () {
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());
                }
            }
        });
    });
});
</script>
  </body>

<!-- <!DOCTYPE HTML>

<html>
  <head>
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>

  <body>
    <form action = "Reviews.php" method = "post">
      <label>University</label>
      <input type = "text" id = "search" class = "form-control" name = "university">
      <br>
      <button type = "submit" name = "button" class = "btn-primary">Submit</button>
    </form>

    <script>
      function activatePlacesSearch()
      {
        var input = document.getElementById('search');
        var autocomplete = new google.maps.places.Autocomplete((input), {types: ['geocode']});
        console.log(autocomplete);

        // google.maps.event.addListener(autocomplete, 'place changed', function()
        // {
        //   var near_place = autocomplete.getPlace();
        //   //document.getElementById('latitude_input').value = 
        //   console.log(near_place.geometry.location.lat());
        //   //document.getElementById('longitude_input').value =
        //   console.log(near_place.geometry.location.lng());

        // })
      }
    </script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWVzvOW3pEdd6e-W4nOLTEd0QM9sxN0nE&libraries=places&callback=activatePlacesSearch"></script>

  </body>

</html>
 -->