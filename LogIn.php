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
    <title> Log in or Register </title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
<style>
  h3{
    color: red;
  }
  h5{
    color: red;
  }
  body{
    background-image: url("https://www.lookboxliving.com.sg/wp-content/uploads/2017/11/LBDA-Private-Apartment-Shortlist1.gif");
  }
footer{
  background: black;
  color: gray;
  font-size: 12px;
  padding: 20px 20px;
  text-align: center;
}

</style>

  <body>
	<div >

    <div class="row">
      <div class="col-md-4">
        <h3> Apartment Search Login </h3>
        <form action="users.html" metod="post">
          <div class="form-group">
            <h5> username </h5>
            <input type="text" name="username" class="form-control" required> </div>

            <div class="form-group">
              <h5> password </h5>
              <input type="password" name="psswd" class="form-control" required> </div>
              <button type="submit" class="btn btn-primary"> Log In </button>

          </form>
	</div>

	</div>
          <div class="col-md-4" style="background-image: url(https://i.imgur.com/6YuRxJA.png)">
            <h3>Register Appartement.stu </h3>
            <form action="preferences.html" metod="post">
              <div class="form-group">
                <label> First Name </label>
                <input type="text" name="fname" class="form-control" required> </div>

                <div class="form-group">
                  <label> Last Name </label>
                  <input type="text" name="lname" class="form-control" required> </div>

                  <div class="form-group">
                      <label> Age </label>
                      <input type="text" name="lname" class="form-control" required> </div>
    

                  <div class="form-group">
                    <label> username </label>
                    <input type="text" name="username" class="form-control" required> </div>

                <div class="form-group">
                  <label> password </label>
                  <input type="password" name="psswd" class="form-control" required> </div>

                <div class="form-group">
                  <label> confirm password </label>
                  <input type="password" name="psswd2" class="form-control" required> </div>
                  <button type="submit" class="btn btn-primary"> Register </button>

              </form>
        </div>
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

              $sql = "INSERT INTO Student(First_name, Last_name, Username, Passwd, City, Preferences) VALUES ('$first_name','$last_name','$username','$psswd','$city', '$preferences');";

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
              
              // session_destroy();
          }

          
          

        ?>
      </div>

  </body>
<footer>
  Data Pirates, COP4710 Fall 2019, FSU, group project
</footer>

</html>
