<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>


    <form method="POST">
				
	    <button type="submit" class="btn btn-primary" name="qrkod">Tvoj QR kod</button>

	</form>
		
		<div class="col-sm-3">
			<?php
				if(isset($_POST['qrkod'])){
                    $sql="SELECT jmbg FROM users;";
                    $result=mysqli_query($conn, $sql);
                    $resultCheck=mysqli_num_rows($result);
                    $row=mysqli_fetch_assoc($result);

					$code=$row['jmbg'];
					echo "
						<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$code&choe=UTF-8'>
					";
				}
			?>
		</div>
	
</body>
</html>