<?php
if(!conn)
{
    echo 'Error while connecting to the database:'. mysqli_connect_error();
}
 // querry
$sql = 'SELECT coordinates FROM Apt_complex WHERE city= $city';
    // get result
$result= mysqli_querry($conn, $sql);

// fetch result
$apt= mysqli_fetch_all($result, MYSQLI_ASSOC);

// free memory
mysqli_free_rsult($result);

// close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
	
	

	<h4 class="center grey-text">Your Apartments!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($apt as $apt){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($apt['name']); ?></h6>
							<div><?php echo htmlspecialchars($apt['address']); ?></div>
						</div>
						
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	
</html>