<?php session_start(); include 'connection.php'; include 'postObj.php'?><!DOCTYPE html><html>

	<head>
		<title>PageFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body><?php include 'navbar.php';
	?><div class='body'><?php
				$result = mysqli_query($connection, "select * from postlog where id = ".$_GET['id'].";");
				$post = firstRow($result);
				if($post){
					(new post($post['title'], $post['text'], $post['crt_at'], $post['id'], $post['imgid']))->showPost();
				}else{
					//header("Location: index.php");
				}
		?></div><?php include 'chatbar.php';?></body>

</html>










