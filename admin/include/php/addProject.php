<?php

require "../../php/connection.php";

if(isset($_POST['submit'])){

    $projectName = $_POST['projectName'];
    $unitCode = $_POST['unitCode'];

    $sql = "INSERT INTO unit_info (Project_Name, Unit_Code) VALUES ('$projectName', '$unitCode')";
    
    $res = mysqli_query ($conn, $sql);
   
    }

?>