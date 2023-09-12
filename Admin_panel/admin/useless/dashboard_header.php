<?php 
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>practice two</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="responsive.css">
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="logo">
						<h1>Trial Two</h1>
					</div>
				</div>
				<div class="col-lg-8">
					<p class="pull-right">You are logged in as <?=$_SESSION['email_id'];?>&nbsp;<a style="background: orange" href="dashboard.php?action=logout">Logout</a></p>
				</div>
			</div>
		</div>
	</div>