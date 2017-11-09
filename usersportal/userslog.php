<?php

$servername = "localhost";
$username = "root";
$password = "!19Globesiplet94!";
$database = "vfd_fd";

$connection = new mysqli($servername, $username, $password, $database);

//check connection
if ($connection->connect_error){
    die("The connection failed ".connect_error);
}

//initialized variables
$logemail = $_POST["email"];
$logfname = $_POST['fname'];
$logpass = $_POST["pass"];
$logphone = $_POST['pnumber'];

//verify the user
$verifyuser = 'SELECT * From usersportal;';
$verifyquery = $connection->query($verifyuser);

//check through the database and log the user in..

if ($verifyquery->num_rows > 0 ){
    while($row = $verifyquery->fetch_assoc()){
        $getemail = $row['Email'];
        $getpass = $row['Password'];
        $getfname = $row['Fullname'];
        $getpnumber = $row['PhoneNumber'];
        if (($getemail == $logemail) && ($getpass == $logpass)){
            session_start();
            $_SESSION["fname"] = $getfname;
            $_SESSION["phone"] = $getpnumber;
            header("Location: http://localhost/vfdform/index.php"); /* Redirect to form */ 
            exit();
        }   
    }
    header("Location: http://localhost/usersportal/index.html"); /* Redirect to login page */ 
    exit();
    } 

?>