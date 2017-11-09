<html>
<head>

  <title>View Current Transactions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

<table class="table table-bordered">
    <thead>
   <tr> 
        <th>Full Name</th>
        <th>Phone Number</th>
        <th>Res. Address</th>
        <th>Office Address</th>
        <th>Occupation</th>
        <th>Next of Kin</th>
        <th>Next-of-kin Number</th>
        <th>Next-of-kin Email</th>
        <th>Account Number</th>
        <th>Account Name</th>
        <th>Bank Name</th>
        <th>Duration</th>
        <th>Amount</th>
        <th>Interest</th>
        <th>Vetted by <?php session_start(); echo $_SESSION["fname"]; ?></th>
    </tr>   
    </thead>

<?php

    $servername = "localhost";
    $username = "root";
    $password = "!19Globesiplet94!";
    $database = "vfd_fd";

    $connection = new mysqli ($servername, $username, $password, $database);

    $query1 = "SELECT * FROM fixeddepositdb WHERE Reference ='".$_SESSION['fname']."';";
    $getfixeddata = $connection->query($query1);
    $getindex = $getfixeddata->num_rows;

        for ($i = 0; $i<$getindex; $i++){
            $row = $getfixeddata->fetch_assoc();
            echo "<tr> <td>".$row['FullName']."</td><td>".$row['PhoneNumber']."</td> <td>".$row['HomeAddress']."</td><td>".$row['OfficeAddress']."</td><td>".$row['Occupation']."</td><td>".$row['NextOfKinName']."</td> <td>".$row['NextOfKinPhoneNo']."</td><td>".$row['NextOfKinEmail']."</td>";
        
    

    $query2 = "SELECT * FROM payoutdb WHERE CustomerID ='".$row['ID']."';";
    $getpaydata = $connection->query($query2);
    $getserial = $getpaydata->num_rows;

        for ($j = 0; $j<$getserial; $j++){
            $col = $getpaydata->fetch_assoc();
            echo "<td>".$col['AccNoPayout']."</td><td>".$col['AccNamePayout']."</td> <td>".$col['BankNamePayout']."</td>";
        

    
    $query3 = "SELECT * FROM placementdb WHERE CustomerID ='".$row['ID']."';";
    $getplacedata = $connection->query($query3);
    $getplaceno = $getplacedata->num_rows;
    
        for ($l = 0; $l<$getplaceno; $l++){
            $rowcol = $getplacedata->fetch_assoc();
            echo "<td>".$rowcol['ProposedDuration']."</td><td>".$rowcol['Amount']."</td> <td>".$rowcol['InterestRate']."</td><td><input type='checkbox' name='verifytransact' value='verified' /> </td></tr>";"</td></tr>";
        }
    }
}
?>
</table>





        
    



</body>




</html>