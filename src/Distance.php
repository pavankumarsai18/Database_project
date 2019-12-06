<?php
	include_once 'includes.php';
	session_start();
	 
	$lat = $_SESSION['lat'];
	$lng = $_SESSION['lng'];

	$sql = "SELECT Name, Rating, Rent, lat, lng FROM Apt_complex WHERE  (lat - $lat) < 0.03 AND  (lat - $lat > -0.3) AND (lng - $lng) < 0.3 AND  (lng - $lng > -0.3)";
	    // get result
	$result= mysqli_query($conn, $sql);
	$result_check = mysqli_num_rows($result);

	function dist($x1, $x2, $x3, $x4)
	{
		$radius = 3958.8;

		return ($radius*pi()*sqrt( pow(($x1 - $x2), 2) + pow(($x3 - $x4), 2)))/180;
	}

	if($result_check > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$temp = array();
			$temp['Name'] = $row['Name'];
			$temp['Dist'] = dist($lat, $lng, $row['lat'], $row['lng']);

			$row = $row + $temp;

		}			
	}
	
	$apt= $result;
	



	
	function cmp($a, $b)
	{
		return ($a['Dist'] <=> $b['Dist']);
	}
	
	//usort($apt, 'cmp');
?>

<!DOCTYPE html>
<html>
	
	<style>
		table,th, td{
			border: 1px solid black;
		}
	</style>

	<h4 class="center grey-text">Your Apartments!</h4>
<body>
	<div class="container">
		<div class="row">
			<table style  = "width:75%">
				<tr>
					<th>Apartment Complex</th>
					<th>Apartment Price</th>
					<th>Rating in Stars</th>
					<th>Prefers</th>
				</tr>

			<form action = "Distance.php" method = "post">
				<?php 
				$count = 0;
				foreach($apt as $apt){ ?>
					<tr> 
						<td> 
							<?php $result = "";
								$result .= $apt['Name'];
							 	echo($result);
						 	?>
						</td>

						<td>
							<?php $rent = "$";
								$rent .= $apt['Rent'];
								echo($rent);
							 ?> 
						</td>

						 <td>
							 <?php
								$rating = "";
								$rating .= $apt['Rating'];
								$rating .= " (";
								$max = intval($apt['Rating']);
								for($i = 0; $i < $max; $i++)
								{
									$rating .= '*';
								}
								$rating .= " )";
								echo($rating);
							 ?>
						</td>
						<td>
							<?php
								$s = strval($count);
							?>
							<button type = "submit"  name  = "<?php echo($s);?>">Prefers</button>
						</td>
					</tr>

				<?php 
				$count++;} ?>

			</table>
		</div>
	</div>
<?php for($count = 0; $count < count($apt); $count++)
	{
		if(isset($_POST[$count]))
		{
			$username = $_SESSION['username'];
			$password = $_SESSION['psswd'];

			$S_id = "SELECT S_id FROM Student WHERE Username = " ;
			$S_id .= " '$username' AND";
			$S_id .= " Passwd = '$password' ;";
			$result = mysqli_query($conn,$S_id);
			$row = mysqli_fetch_array($result);
			$student_id = $row['S_id'];
			
			$name = $apt['Name'];
			$A_id = "SELECT A_id FROM Apt_complex WHERE Name= '$name';";
			$result = mysqli_query($conn,$A_id);
			$row = mysqli_fetch_array($result);
			$Apt_id = $row['A_id'];
			

			$insert = "INSERT INTO Prefers_cmplx (S_id, A_id) VALUES ($student_id, $Apt_id );";
			$_SESSION['A_id'] = $Apt_id;
			$_SESSION['S_id'] = $student_id;
			if(mysqli_query($conn,$insert))
			{
				echo("Successfully done");
			}
			else
			{
				echo("Try Again");
			}

		}
	}

?>

<div>
	<form method = "post" action = "Print_review.php">
		<button type = "submit" name = "redir">Submit</button>
	</form>

	<?php 
		if(isset($_POST['redir']) )
		{
			header("Location: ./Print_review.php");
		}
	?>
</div>

</body>
</html>