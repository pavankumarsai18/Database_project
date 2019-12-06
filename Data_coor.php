<?php 
	include_once 'includes.php';
	session_start();
	$_SESSION["lat"] = $_POST["lat"];
	$_SESSION["lng"] = $_POST["lng"];

	$first_name = $_SESSION['fname'];
	$last_name = $_SESSION['lname'];
	$username= $_SESSION['username'];
	$psswd= $_SESSION['psswd'];
	$city= $_SESSION['city'];
	$age= $_SESSION['age'];
	$uni= $_SESSION['uni'];
	$major= $_SESSION['major'];
	$preferences = $_SESSION["preferences"];

	$sql = "INSERT INTO Student(First_name, Last_name, Username, Passwd, City, Age,University, Major, Preferences) VALUES ('$first_name','$last_name','$username','$psswd','$city', $age,'$uni', '$major','$preferences');";

	  if(!mysqli_query($conn,$sql))
	  {
	    echo("False did not insert");
	    header(".");
	  }
	  //change this
	  else
	  {
	    header("Location: ./sort.php");
	  }
	
?>




