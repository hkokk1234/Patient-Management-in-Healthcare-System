<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Patient</title>
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    </style>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION["user"]) || $_SESSION["user"] == "" || $_SESSION['usertype'] != 'a') {
    header("location: ../login.php");
    exit; 
}

include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = isset($_POST["pname"]) ? mysqli_real_escape_string($database, $_POST["pname"]) : '';
    $pemail = isset($_POST["pemail"]) ? mysqli_real_escape_string($database, $_POST["pemail"]) : '';
    $ppassword = isset($_POST["ppassword"]) ? mysqli_real_escape_string($database, $_POST["ppassword"]) : '';
    $paddress = isset($_POST["paddress"]) ? mysqli_real_escape_string($database, $_POST["paddress"]) : '';
    $pnic = isset($_POST["pnic"]) ? mysqli_real_escape_string($database, $_POST["pnic"]) : '';
    $pdob = isset($_POST["pdob"]) ? mysqli_real_escape_string($database, $_POST["pdob"]) : '';
    $ptel = isset($_POST["ptel"]) ? mysqli_real_escape_string($database, $_POST["ptel"]) : '';

    $insert_query = "INSERT INTO patient (pname, pemail, ppassword, paddress, pnic, pdob, ptel) 
                     VALUES ('$pname', '$pemail', '$ppassword', '$paddress', '$pnic', '$pdob', '$ptel')";

    if ($database->query($insert_query) === TRUE) {
        header("Location: http://localhost/personaldoctor/admin/patient.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . $database->error;
    }
}
?>

<div class="container">
        <h2>Add New Patient</h2>
        <form action="add_patient.php" method="post">
            <label for="pname">Name:</label><br>
            <input type="text" id="pname" name="pname" required><br><br>
            
            <label for="pemail">Email:</label><br>
            <input type="email" id="pemail" name="pemail" required><br><br>
            
            <label for="ppassword">Password:</label><br>
            <input type="password" id="ppassword" name="ppassword" required><br><br>
            
            <label for="paddress">Address:</label><br>
            <textarea id="paddress" name="paddress" rows="4" required></textarea><br><br>
            
            <label for="pnic">AMKA:</label><br>
            <input type="text" id="pnic" name="pnic" required><br><br>
            
            <label for="pdob">Date of Birth:</label><br>
            <input type="date" id="pdob" name="pdob" required><br><br>
            
            <label for="ptel">Telephone:</label><br>
            <input type="tel" id="ptel" name="ptel" required><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>