<?php 
	session_start();
	include 'connection.php';
	include 'postObj.php';
	if(!isset($_SESSION['username'])){
		header("Location: login.php");
	}
?><!DOCTYPE html>
<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>
	<?php include 'navbar.php';
	?><div class='body'>
	<h1>Home</h1>
		<?php
			if(isset($_SESSION['username'])){
				$result = mysqli_query($connection, "select * from postlog where userid = ".$_SESSION['id'].";");
				if(mysqli_num_rows($result)){
					while($current = mysqli_fetch_assoc($result)){
						(new post($current['title'], $current['text'], $current['crt_at'], $current['id']))->listItem();
						/* echo "<h1>".$current['text']."</h1>";
						echo "<h1>".$current['title']."</h1>";
						echo "<h1>".$current['id']."</h1>";
						echo "<h1>".$current['imgid']."</h1>";
						echo "<h1>".$current['crt_at']."</h1>"; */
					}
				}else{
					echo "<p>You have no posts yet</p>";
				}
			}else{
				echo "<p>You not logged in</p>";
			}
		?>
		
		</div><?php include 'chatbar.php';
		?></body>
</html>