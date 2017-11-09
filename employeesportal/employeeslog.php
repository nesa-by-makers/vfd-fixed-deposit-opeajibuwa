<?php

$servername = "localhost";
$username = "root";
$password = "!19Globesiplet94!";
$database = "vfd_fd";

$connection = new mysqli($servername, $username, $password, $database);

//check connection
if ($connection->connect_error){
    die("The connection failed  ".connect_error);
}

//initialized variables
$logemail = $_POST["email"];
$logpass = $_POST["pass"];
$logposition = $_POST["position"];

//verify the user
$verifyemployee = 'SELECT * From employeesportal;';
$verifyquery = $connection->query($verifyemployee);

//check through the database and log the user in..

if ($verifyquery->num_rows > 0 ){
    while($row = $verifyquery->fetch_assoc()){
        $getemail = $row['Email'];
        $getpass = $row['Password'];
        $getposition = $row['Position'];
        $getusername = $row['Fullname'];
        if (($getemail == $logemail) && ($getpass == $logpass)){
            session_start();
            $_SESSION['fname'] = $getusername;
            $_SESSION['position'] = $getposition;
            header("Location: http://localhost/employeesportal/view.php"); /* Redirect to form */ 
            exit();
        }   
    }
    header("Location: http://localhost/employeesportal/index.html"); /* Redirect to login page */ 
    exit();
    } 



?>