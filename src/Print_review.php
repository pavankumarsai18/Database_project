<?php
	include_once 'includes.php';
	 session_start();

	 $A_id = $_SESSION['A_id'];
	 $S_id = $_SESSION['S_id'];

	$sql = "SELECT c.Comments FROM Apt_complex a, Is_about b, Review c WHERE a.A_id = ";
	$sql .= strval($A_id);
	$sql .= " ";
	$sql .= "AND b.A_id = a.A_id AND c.S_id = b.S_id;";
	// $echo($sql);

	$result= mysqli_query($conn, $sql);
	$result_check = mysqli_num_rows($result);
	$count = 0;
	echo("<h2>Reviews</h2>");
	if($result_check > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			echo($count+1);
			echo("). ");
			echo($row['Comments']);
			echo("<br>");
			echo("<br>");
			$count++;
		}
	}

	else
	{
		echo("No data in the database");
	}
?>

<!DOCTYPE HTML>
<html>
<head>
</head>

<body>
	<form action = "Roomate.php" method = "post">
		<button type = "submit" name = "search_roomate"> Search for roomates</button>
	</form>
	<?php if(isset($_POST['search_roomate']))
		header("Location: ./Roomate.php");
	 ?>
</body>
</html>