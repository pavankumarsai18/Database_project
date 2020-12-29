<?php
  include_once 'includes.php';
  session_start();
  //print_r($_SESSION);

  // $first_name = $_SESSION['fname'];
  // echo($first_name);
  // echo("<br>");

  // $sql_ = "INSERT INTO Student(First_name, Last_name, Username, Passwd, City, Preferences) VALUES ('$first_name', 'abc','def','ghi','klm','10001');";
  
  // mysqli_query($conn,$sql_)
?>

<html>
  <head>
    <title> Preferences </title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>

        #geomap{
        width: 100%;
        height: 400px;
        }
        div {
    text-align: center;
   /* display: flex;
    height: 40px;
    border: 1px solid;*/
}
       body{
            background-image: url("https://webengage.com/blog/wp-content/uploads/sites/4/2019/05/Geofencing-01.gif");
            width:100%;
        }
        footer{
          background: black;
           color: gray;
          font-size: 12px;
          padding: 20px 20px;
          text-align: center;
      }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  </head>

    <body>

    <div class="col-md-15" id = "display" style="background-image: url(https://i.imgur.com/6YuRxJA.png)">
      
      <h3>Search for your new Apartment </h3>

      <form action = "Data_coor.php" method = "post">
          <div class = "form-group">
            
            <label>Major</label>
            <input type = "text" name = "major" class = "form-control" required>
            <br>

            <label>Do you drink?</label>
            <br>
              YES <input type = "radio" name = "drink" value = "1" class = "form-group" required>
               NO <input type = "radio" name = "drink" value = "0" class = "form-group" required>
            <br>

            <label>Do you smoke?</label>
            <br>
              YES <input type = "radio" name = "smoke" value = "1" class = "form-group" required>
              NO <input type = "radio" name = "smoke" value = "0" class = "form-group" required>
            <br>

            <label>Do you own pets?</label>
            <br>
              YES<input type = "radio" name = "pets" value = "1" class = "form-group" required>
              NO <input type = "radio" name = "pets" value = "0" class = "form-group" required>
            <br>


            <label>Do you prefer roomates who don't drink?</label>
            <br>
              YES<input type = "radio" name = "pref_drink" value = "0" class = "form-group" required>
              NO <input type = "radio" name = "pref_drink" value = "1" class = "form-group" required>
            <br>

            <label>Do you prefer roomates who don't smoke?</label>
            <br>
              YES<input type = "radio" name = "pref_smoke" value = "0" class = "form-group" required>
              NO <input type = "radio" name = "pref_smoke" value = "1" class = "form-group" required>
            <br>

            <label>Do you prefer roomates who don't own pets?</label>
            <br>
              YES<input type = "radio" name = "pref_pets" value = "0" class = "form-group" required>
              NO <input type = "radio" name = "pref_pets" value = "1" class = "form-group" required>
            <br>

            <label> How far do you want your apartment from your university?</label>
            <br>
            <select>
              <option>1 mile</option>
              <option>3 miles</option>
              <option>5 miles</option>
              <option>10 miles</option>
              <option>more than 10 miles</option>
            </select> 
          </div>

          <label> University </label>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
              <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

              <form>
              <div class="form-group input-group">
                <input type="text" id="search_location" class="form-control" placeholder="Search location">
                  <button type = "submit" name = "pressed" class = "btn-primary"> Submit </button>
              </form>

              <div id="geomap"></div>

              <!-- display selected location information -->
              <h4>Location Details</h4>
              <p>Address: <input type="text" class="search_addr" size="45"></p>
              <p>Latitude: <input type="text" name = "lat" class="search_latitude" size="30"></p>
              <p>Longitude: <input type="text" name = "lng" class="search_longitude" size="30"></p>
              </form>



              <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC37UKz6hbReZZtiQ9w1S2UBh7hIdbA7Dc"></script>

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


        <?php

            if(isset($_POST["pressed"]))
            {

              $first_name  = $_SESSION['fname'];
              $last_name   = $_SESSION['lname'];
              $username    = $_SESSION['username'];
              $psswd       = $_SESSION['psswd'];
              $city        = $_SESSION['city'];
              $age         = $_SESSION['age'];

              $major = "";
              $preferences = "";

              if(isset($_POST["major"])){
                $major = $_POST["major"];
              }

              if(isset($_POST["drink"])){
                $preferences .= $_POST["drink"];
                $preferences .= " ";
              }
              
              if(isset($_POST["smoke"])){
                $preferences .= $_POST["smoke"];
                $preferences .= " ";
              }
              
              if(isset($_POST["pets"])){
                $preferences .= $_POST["pets"];
                $preferences .= " ";
              }
              
              
              if(isset($_POST["pref_drink"])){
                $preferences .= $_POST["pref_drink"];
                $preferences .= " ";
              }

              if(isset($_POST["pref_smoke"])){
                $preferences .= $_POST["pref_smoke"];
                $preferences .= " ";
              }

              if(isset($_POST["pref_pets"]))
              {
                $preferences .= $_POST["pref_pets"];
                $preferences .= " ";
              }

              $_SESSION["major"] = $major;
              $_SESSION["preferences"] = $preferences;
              
          } 

        ?>
  </div>
  </body>
</html>