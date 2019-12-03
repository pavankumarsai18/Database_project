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
                  body{
                      background-image: url("https://webengage.com/blog/wp-content/uploads/sites/4/2019/05/Geofencing-01.gif");
                  }
                  footer{
                    background: black;
                     color: gray;
                    font-size: 12px;
                    padding: 20px 20px;
                    text-align: center;
                }
              </style>
  </head>

    <body>
    
    <div class="col-md-4" style="background-image: url(https://i.imgur.com/6YuRxJA.png)">
      
      <h3>Search for your new Apartement </h3>

      <form action = "Page_2.php" method = "post">
          <div class = "form-group">

            <label>University</label>
            <input type = "text"  name = "university" class = "form-control" required>
            <br>
            
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


            <label>Do you prefer roomates who drink?</label>
            <br>
              YES<input type = "radio" name = "pref_drink" value = "1" class = "form-group" required>
              NO <input type = "radio" name = "pref_drink" value = "0" class = "form-group" required>
            <br>

            <label>Do you prefer roomates who smoke?</label>
            <br>
              YES<input type = "radio" name = "pref_smoke" value = "1" class = "form-group" required>
              NO <input type = "radio" name = "pref_smoke" value = "0" class = "form-group" required>
            <br>

            <label>Do you prefer roomates who own pets?</label>
            <br>
              YES<input type = "radio" name = "pref_pets" value = "1" class = "form-group" required>
              NO <input type = "radio" name = "pref_pets" value = "0" class = "form-group" required>
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
          <button type = "submit" name = "pressed" class = "btn-primary"> Submit </button>

      </form>

        <?php

            if(isset($_POST["pressed"]))
            {

              
              //echo(count($_SESSION));
              //print_r($_SESSION);
              // echo($_SESSION['fname']."\n");
              // echo($_SESSION['lname']."\n");
              // echo($_SESSION['username']."\n");
              // echo($_SESSION['psswd']."\n");
              // echo($_SESSION['city']."\n");

              $first_name  = $_SESSION['fname'];
              $last_name   = $_SESSION['lname'];
              $username    = $_SESSION['username'];
              $psswd       = $_SESSION['psswd'];
              $city        = $_SESSION['city'];
              $age         = $_SESSION['age'];
              
              $preferences = '';




              if(isset($_POST["university"]))
              {
                $preferences .= $_POST["university"];
                $preferences .= " ";
              }
              if(isset($_POST["major"])){
                $preferences .= $_POST["major"];
                $preferences .= " ";
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

              if(isset($_POST["pref_pets"])){
                $preferences .= $_POST["pref_pets"];
                $preferences .= " ";
              }

              //echo("prefereces: ". $preferences);

              //$sql = "INSERT INTO Student(First_name) VALUES ('$first_name');";

              $sql = "INSERT INTO Student(First_name, Last_name, Username, Passwd, City, Age, Preferences) VALUES ('$first_name','$last_name','$username','$psswd','$city', $age, '$preferences');";

              //mysqli_query($conn,$sql);

              if(!mysqli_query($conn,$sql))
              {
                echo("False did not insert");
                header(".");
              }
              //change this
              else
              {
                $_SESSION['preferences'] = $preferences;
                $_SESSION['uni'] = $_POST['university'];
                header("Location: ./Reviews.php");
              }
              //change this when you are adding a new page
              // $_SESSION = array();
              
              //session_destroy();
          }

          
          

        ?>
  </div>
  </body>
</html>