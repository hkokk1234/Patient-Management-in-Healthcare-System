<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
<title> home page<\title>

</head>
<body> 
<?php

include("include/header.php");
?>
 <style>
        body {
            background-image: url('img/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            margin-top: 50px;
        }
        .shadow {
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
         </style>
<div class="container">
	<div class="col-md-12">
		<div class="row">
					<div class="col-md-3 mx-1 shadow">
<img src="img/info.jpg">
<h5 class="text-center">click here for more informations</h5>
<a href='informations/info.html'>
	<button class="btn btn-success my-3" style="margin-left:30%;">
more info</button>
</a>
					</div>
					<div class="col-md-3 mx-1 shadow">
<img src="img/patient.jpg"style="width:100%;">

<h5 class="text-center">create account helps you </h5>
<a href='signup.php'>
	

<button class="btn btn-success my-3" style="margin-left:30%;">
apply now!!!</button>
</a>
				</div>
					
				
				</div>




</body>
</html>