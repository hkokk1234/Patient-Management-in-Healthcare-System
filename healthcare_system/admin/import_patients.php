<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css"> <!-- Adjust the path as per your file structure -->
    <title>Import Patients</title>
</head>
<body>
    <div class="container">
        <h2>Import Patients</h2>
        <form action="import_patients.php" method="post" enctype="multipart/form-data">
            <label for="file">Choose Excel File:</label><br>
            <input type="file" id="file" name="file" accept=".xlsx, .xls" required><br><br>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION["user"]) || $_SESSION["user"] == "" || $_SESSION['usertype'] != 'a') {
    header("location: ../login.php");
    exit; 
}


include("../connection.php");

require 'vendor/autoload.php'; 

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($fileTmpPath);
        $worksheet = $spreadsheet->getActiveSheet();

        $database->begin_transaction();

        try {
            foreach ($worksheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                $data = [];
                foreach ($cellIterator as $cell) {
                    $data[] = mysqli_real_escape_string($database, $cell->getValue());
                }

                if (count($data) == 7) {
                    $pname = $data[0];
                    $pemail = $data[1];
                    $ppassword = $data[2];
                    $paddress = $data[3];
                    $pnic = $data[4];
                    $pdob = $data[5];
                    $ptel = $data[6];

                    $insert_query = "INSERT INTO patient (pname, pemail, ppassword, paddress, pnic, pdob, ptel) 
                                     VALUES ('$pname', '$pemail', '$ppassword', '$paddress', '$pnic', '$pdob', '$ptel')";
                    $database->query($insert_query);
                }
            }

            $database->commit();
            echo "Patients imported successfully!";
        } catch (Exception $e) {
            $database->rollback();
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
