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
$logfname = $_POST['fname'];
$logemail = $_POST['email'];
$logphone = $_POST['pnumber'];
$logpass = $_POST['pass'];
$logcpass = $_POST['cpass'];

//insert into users database
$query = $connection->prepare("INSERT INTO usersportal (Fullname, Email, PhoneNumber, Password, ConfirmPassword) VALUES (?,?,?,?,?)");
$query->bind_param("sssss", $logfname, $logemail, $logphone, $logpass, $logcpass);

//Once data is succesfully saved to the database, redirect users to another page
if($query->execute() == true){
    header("Location: http://localhost/vfdform/index.php");
    exit();
}
else {
    header("Location: http://localhost/usersportal/index.html");
    exit();
}

?>
