<?php
	include_once 'includes.php';
	 session_start();
	 // print_r($_SESSION);
	 $city = $_SESSION['city'];
	 // $preferences = $_SESSION['preferences'];
	 $S_id = $_SESSION['S_id'];
	 // $uni = $_SESSION['uni'];

	 $sql = "SELECT a.First_name, a.Username, a.University, a.Preferences FROM Student a, Apt_complex b, Prefers_cmplx c WHERE a.S_id <> 84 AND a.S_id = c.S_id AND b.A_id = c.A_id;";
	 //echo($sql);
	 $result= mysqli_query($conn, $sql);
	 //$result_check = mysqli_num_rows($result);
	//  if($result_check > 0)
	// {

	 	echo("<h2> Potential Roomates</h2>");
		// while($row = mysqli_fetch_assoc($result))
		// {

		// 	echo($row['First_name']);
		// 	echo("------------------");
		// 	echo($row['University']);
		// 	echo("------------------");
		// 	echo($row['Username']);

		// 	echo("<br>");
		// }
	//}
?>

<!DOCTYPE HTML>
<html>
	<head>
			<style>
		table,th, td{
			border: 1px solid black;
		}

	</style>
	</head>

	<body>
		<table style  = "width:75%">
				<tr>
					<th>First Name</th>
					<th>University</th>
					<th>Username</th>
				</tr>

				<?php 
				$count = 0;
				foreach($result as $result){ ?>
					<tr> 
					<td> <?php
					$name = "";
					$name .= $result['First_name'];
						 echo($name);
					 ?>
					</td>
					<td>
					<?php
					$Uni = "";
					$Uni .= $result['University'];
					echo($Uni);
					 ?> 
					</td>
					 <td>
					 <?php
					$username = "";
					$username .= $result['Username'];
					
				
					echo($username);
					 ?>
					</td>

				</tr>

				<?php 
				$count++;} ?>
			</table>
		<form action = "index.php" method = "post" >
			<button type="submit" name = "log-out">Log out</button>
		</form>
		<?php
			if(isset($_POST['log-out']))
			{
				//header("Location: ./index.php");
				session_destroy();
				
			}
		?>
	</body>
</html>