<?php

if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];


    $sql = "DELETE FROM patients WHERE id = $patient_id";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Patient ID not provided";
}
?>
