

<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">




</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-info bg-info">
<h5 class="text-white">doctor office management</h5>
   
   <ul class="mr-auto"></div>
   <ul class="navbar-nav">

<?php
if(isset($_SESSION['admin']))
{
$user=$_SESSION['admin'];

echo'
    <li class="nav-item"><a href="#" class="nav-link text-white">$user</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
    ';

}else if(isset($_SESSION['doctor']))
{

$user = $_SESSION['doctor'];
echo'
<li class="nav-item"><a href="#" class="nav-link text-white">" $user.
</a></li>
<li class="nav-item"><a href="logout.php" class="nav-link
text-white">logout</a></li>

';

}
else{
echo '


<li class="nav-item"> <a href="index.php" class="nav-link
text-white">Home</a></li>
<li class="nav-item"><a href="login.php" class="nav-link text-white">login</a></li>
<li class="nav-item"><a href="signup.php" class="nav-link text-white">register</a></li>


';


}

?>
    
</nav>

</body>
</html>
