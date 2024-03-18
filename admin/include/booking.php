<?php

require "../backend/connection.php";

if (isset($_POST['book'])) {

    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $tinNo = $_POST['tinNo'];
    $gender = $_POST['gender'];
    $civilstatus = $_POST['civilstatus'];
    $citizenship = $_POST['citizenship'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $passportnumber = $_POST['passportnumber'];
    $presentAddress = $_POST['presentAddress'];
    $permanentAddress = $_POST['permanentAddress'];
    $employerName = $_POST['employerName'];
    $workAddress = $_POST['workAddress'];

    $sql = "INSERT INTO client_info (FirstName, MiddleName, LastName, Date_of_birth, Place_of_birth, Tin_no, Gender, Civil_status, Citizenship, Email, Phone_no, Passport_no, Present_address, Permanent_address, Employer_name, Work_address) 
    VALUES ('$firstname', '$middlename', ' $lastname', '$birthdate', '$birthplace', '$tinNo', '$gender', '$civilstatus', '$citizenship', '$email', '$phonenumber', '$passportnumber', '$presentAddress', '$permanentAddress', '$employerName', '$workAddress')";

    $res = mysqli_query($conn, $sql);
}
