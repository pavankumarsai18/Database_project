<?php 
	include_once 'includes.php';
	session_start();
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
    <br>

    <p>Enter the university Again</p>
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


<div id="geomap"></div>

<h4>Location Details</h4>
<p>Address: <input type="text" class="search_addr" size="45"></p>
<p>Latitude: <input type="text" name = "lat" class="search_latitude" size="30"></p>
<p>Longitude: <input type="text" name = "lng" class="search_longitude" size="30"></p>
</form>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWVzvOW3pEdd6e-W4nOLTEd0QM9sxN0nE"></script>


    <script>
var geocoder;
var map;
var marker;

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
    

    $('.get_map').click(function (e) {
        var address = $(PostCodeid).val();
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $('.search_addr').val(results[0].formatted_address);
                $('.search_latitude').val(marker.getPosition().lat());
                $('.search_longitude').val(marker.getPosition().lng());

                var lat_lng = {};
                lat_lng.lat = marker.getPosition().lat();
                lat_lng.lng = marker.getPosition().lng();

                $.ajax({
                    url: "Data_coor.php",
                    method: "post",
                    data: lat_lng,
                    success: function (res){
                        console.log(res);
                    } 
                })

            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
        e.preventDefault();
    });

   
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

    <form action = "index.php" method = post>
    <button type = "submit" name = "logout">Logout</button>
  </form>
    <?php
        if(isset($_POST['logout'])){
        echo("Logged out");
        sleep(3);
        session_destroy();
      }
    ?>
</body>

