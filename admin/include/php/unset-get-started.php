<?php

session_start();

require "../../../php/connection.php";


if (isset($_POST['unset_get_started'])) {

    if(isset($_SESSION['new_user'])) {
        unset($_SESSION['new_user']);
        header("Location: ../../../index.php");
    }

   
    
    


}
