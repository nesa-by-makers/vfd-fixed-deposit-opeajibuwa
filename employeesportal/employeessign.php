<?php

$servername ="localhost";
$username ="root";
$password ="!19Globesiplet94!";
$database ="vfd_fd";


$connection = new mysqli($servername, $username, $password, $database);

//check connection
if ($connection->connect_error){
    die("The connection failed". connect_error);
}

//initialized variables from the signup form
$user = $_POST['username'];
$email = $_POST['email'];
$position = $_POST['position'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];



$query = $connection->prepare("INSERT INTO employeesportal (Fullname, Email, Position, Password, ConfirmPassword) VALUES (?,?,?,?,?)");

$query->bind_param("sssss",$user,$email,$position,$pass,$cpass);


//Once data is succesfully saved to the database, redirect users to another page
if($query->execute() == true){
    header("Location: http://localhost/vfdformpage/index.php");
    exit();
}
else {
    header("Location: http://localhost/employeesportal/index.html");
    exit();
}

?>
