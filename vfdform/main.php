<?php

    $servername= "localhost";
    $username = "root";
    $password = "!19Globesiplet94!";
    $database = "vfd_fd";

    $connection = new mysqli($servername,$username,$password,$database);
    //check connection
    if ($connection->connect_error){
        die("The connection failed   ".connect_error);
    }
    // init form variables
    $fullname = $_POST["fname"];
    $phonenumber = $_POST["pnumber"];
    $resaddr =$_POST["resident"];
    $offaddr = $_POST["office"];
    $occupation = $_POST["occupation"];
    $duration = $_POST["duration"];
    $amount = $_POST["amount"];
    $acctnumba = $_POST["acctnumba"];
    $acctname = $_POST["acctname"];
    $bankname = $_POST["bname"];
    $kinname = $_POST["next"];
    $nextpnumba = $_POST["pnext"];
    $kinemail = $_POST["email"];
    $reference = $_POST["ref"];

    //inserting into fixeddepositdb
    $query = $connection->prepare("INSERT INTO FIXEDDEPOSITDB (FullName, PhoneNumber, HomeAddress, OfficeAddress, Occupation,  NextOfKinName, NextOfKinPhoneNo,NextOfKinEmail,Reference) VALUES(?,?,?,?,?,?,?,?,?)");
    $query->bind_param("sssssssss",$fullname,$phonenumber,$resaddr,$offaddr,$occupation,$kinname,$nextpnumba,$kinemail,$reference);
   
    //get the customerID
    if($query->execute() == true){
        $customerid = $connection->insert_id;
    }
    
    //inserting into payoutdb
    $query1 = $connection->prepare("INSERT INTO PAYOUTDB(AccNoPayout, AccNamePayout, BankNamePayout, CustomerID) VALUES(?,?,?,?)");
    $query1->bind_param("ssss",$acctnumba,$acctname,$bankname,$customerid);
    //get the payoutID
    if($query1->execute() == true){
        $payoutid = $connection->insert_id;
    }
     
    //call getInterest ()
  $getInterest = 'CALL getInterest('.$duration.','.$amount.')';
  $InterestResult = $connection->query($getInterest);
  $insertInterestRate = $InterestResult->fetch_assoc();
   $rate =  $insertInterestRate['interestrates'];

   $connection->close();
   $connection = new mysqli($servername,$username,$password,$database);

    //inserting into placementdb
    $query2 = $connection->prepare("INSERT INTO PLACEMENTDB (ProposedDuration, Amount, CustomerID, PayoutID, InterestRate) VALUES (?,?,?,?,?)");
    //echo $connection->error;
    $query2->bind_param("sssss",$duration,$amount,$customerid,$payoutid,$rate);

  
     
    
    if($query2->execute() == true){

        echo "Thanks for filling out this form. We will process your request and get in touch with you shortly!";
    }
    else {
        echo "Error connecting to database".$connection->error;
    }


   
        $connection->close();
?>