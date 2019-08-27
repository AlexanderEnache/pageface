<?php include 'connection.php';
	if(isset($_SESSION['username'])){
		$a = "loged in as ".$_SESSION['name'];
			$_SESSION['end'] = true;
		$href = "login.php";
		$signup = "";
		$myface = "<li class='navlink'><a href='myface.php' class='navlink'>my face</a></li>";
		$chats = 
		"<li id='chat-hover' class='navlink'>
			<p id='chats'>chats</p>
			<div id='chat-list'>
				<ul id='open-chats' class='dropdown'>
					
				</ul>
			</div>
		</li>
			
			";
			
	}else{
		$a = "login";
		$href  = "login.php";
		$signup = "<li class='navlink'><a href='signup.php' class='navlink'>signup</a></li>";
		$myface = "";
		$chats = "";
	}

	if(isset($_GET['search'])){
		session_start();
		$_SESSION['find'] = $_GET['find'];	
		Header('Location: search.php');
	}

?><!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='jquery-3.4.1.js'></script>
	<script src="https://kit.fontawesome.com/6734dedc8e.js"></script>
	<script>
		$(document).ready(function(){
			$('#chat-hover').mouseover(function(){
				$('#chat-list').css('display', 'block');
			});
			$('#chat-hover').mouseout(function(){
				$('#chat-list').css('display', 'none');
			});
			$('#open-chats').load('loadOpenChats.php', {
				user: $('#user').text()
			});
			
		});
	</script>
</head>

<body>
	<div class = 'navbar'>
		<ul class="navlinks">
			<li class='navlink logo'><h1>AssFace</h1></li>
			<li class='navlink search-user-li'>
				<form class='search-user-form' action="navbar.php" method="get" class="findFriend">
					<input class='search-user-bar' type="search" name="find">
					<button class='search-user-button' type="submit" name="search"><i class="fas fa-search"></i></button>
				</form>
			</li>
			<li class='navlink'><a href="index.php"   class="navlink">home</a></li>
			<li class='navlink'><a href="post.php"   class="navlink">post</a></li><?php
			echo $signup;
			echo $myface;
			echo $chats;
			?><li class='navlink'><a href="login.php"  class="navlink"><?php echo $a;?></a></li>
		</ul>
		
	</div><?php
		if(isset($_SESSION['username'])){
			echo "<p id='user' style='display:none;'>".$_SESSION['username']."</p>";
		}
	?></body>

</html>





