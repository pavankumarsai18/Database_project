<?php
	include_once 'includes.php';
 session_start();
?>


<html>
  <head>
    <title> Log in or Register </title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

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

  </head>

  <body>

    <div>
      <div class="row">
      
        <div class="col-md-4">
          
          <h3> Apartment Search Login </h3>
          
          <form action="index.php" method="post">
            
            <div class="form-group">
              <label> username </label>
              <input type="text" name= "username" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label> password </label>
              <input type="password" name="psswd" class="form-control" required>
            </div>
            
            <button type="submit" name = "log_in"class="btn btn-primary"> Log In </button>
          </form>

	     </div>

	    </div>

        <div class="col-md-4" style="background-image: url(https://i.imgur.com/6YuRxJA.png)">
          <h3>Register</h3>
          <form action="index.php" method="post">
            
            <div class="form-group">
              <label> First Name </label>
              <input type="text" name="fname" class="form-control" required>

              <label> Last Name </label>
              <input type="text" name="lname" class="form-control" required>

              <label> username </label>
              <input type="text" name="username" class="form-control" required>

              <label> password </label>
              <input type="password" name="psswd" class="form-control" required>

              <label> confirm password </label>
              <input type="password" name="psswd2" class="form-control" required>


              <label> Age</label>
              <input type="password" name="age" class="form-control" required>


              <label> City </label>
              <input type="text" name="city" class="form-control" required>
            </div>

            <button type="submit" name = "register" class="btn btn-primary"> Register </button>
            <br>

             <?php

                if(isset($_POST["log_in"]))
                {
                    if(isset($_POST['username']))
                    {
                      $_SESSION['username'] = htmlspecialchars($_POST['username']);
                      //echo($_SESSION['username']);
                      $username = htmlspecialchars($_POST['username']);
                    }
                    
                    if(isset($_POST['psswd']))
                    {
                      
                      $password =  htmlspecialchars($_POST['psswd']);

                      $sql = "SELECT * FROM Student WHERE username = '$username' ";

                      $result = mysqli_query($conn,$sql);
                      $num_rows = mysqli_num_rows($result);

                      if($num_rows > 0)
                      {
                        $row = mysqli_fetch_assoc($result);
                        if($row['password'] == $password)
                          echo 'Welcome ', $username, ' !!!!';
                        //else
                          //echo 'Invalid Password Try Again!!!\n';
                      }
                    }
                }

              else if(isset($_POST['register']))
              {
                  if(isset($_POST['psswd']) && isset($_POST['psswd2']))
                  {
                    if($_POST['psswd'] != $_POST['psswd2'])
                    {
                      echo("Invalid passwords don't match");
                      sleep(1);
                      header("Refresh:0");
                    }

                  }

                  if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['psswd'])&& isset($_POST['psswd2']) && isset($_POST['city']) )
                  {
                      

                      // echo($_POST['fname']."\n");
                      // echo($_POST['lname']."\n");
                      // echo($_POST['username']."\n");
                      // echo($_POST['psswd']."\n");
                      // echo($_POST['city'])."\n";

                      // $first_name   = $_POST['fname'];
                      // $last_name    = $_POST['lname'];
                      // $username     = $_POST['username'];
                      // $psswd        = $_POST['psswd'];
                      // $city         = $_POST['city'];
                      
                      $_SESSION['fname']    =  $_POST['fname'];
                      $_SESSION['lname']    =  $_POST['lname'];
                      $_SESSION['username'] = $_POST['username'];
                      $_SESSION['psswd']    = $_POST['psswd'];
                      $_SESSION['city']     = $_POST['city'];
                      $_SESSION['age']      = $_POST['age'];

                      //print_r($_SESSION);
                      
                      header("Location: Page_2.php");
                      // echo("-------------\n");

                      // echo($_SESSION['fname']."\n");
                      // echo($_SESSION['lname']."\n");
                      // echo($_SESSION['username']."\n");
                      // echo($_SESSION['psswd']."\n");
                      // echo($_SESSION['city']."\n");
                 }
              }
            ?>
            </form>
        </div>
    </div>

  </body>






</html>




