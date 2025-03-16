<?php

    $database= new mysqli("localhost","root","","personaldoctor");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>