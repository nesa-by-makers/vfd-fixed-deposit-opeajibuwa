<html>
<head>
<title>Fixed Deposit Investment Form</title>
<link rel="stylesheet" href="stylesheet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
img { padding-top: 30px;}
span { font-size: 12px;}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $(".bcolor").focus(function(){
        $(this).css("background-color", "#FFFFFF");
    });
$(".bcolor").blur(function(){
        $(this).css("background-color", "#D0D8F7");
    });
});
</script>

</head>

<body>

<header class="lab" style = "text-align: right">
<img src = "logo.jpg" style = "float:left">
<div class = "pep"> FIXED DEPOSIT PLACEMENT FORM</div>
</header>
	
<p class="sub">Thank you for choosing to invest with VFD Bridge. We are pleased to have the opportunity to offer our services to you<br /> 
Kindly provide ALL your details below (as applicable) to aid the processing of your placement:</p>

<br />
<div class ="wrapper" >

<form action = "main.php" method= "POST" >
	<div class="innerwrapper">
		<div><label for="fullName">Full Name:</label> <input type ="text" class = "bcolor" name = "fname" value = "<?php session_start(); echo $_SESSION["fname"] ?>"></div><br>
		<div><label for="phoneNumber">Phone Number:</label><input type ="number" class = "bcolor" name = "pnumber" value = "<?php echo $_SESSION["phone"] ?>"</div><br><br>
		<div><label for="ResidentialAddress">Residential Address:</label><textarea class = "bcolor" name = "resident" rows ="3" cols = "107%" style = "overflow: hidden;"></textarea></div><br>
		<div><label for="OfficeAddressr">Office Address:</label><input type = "text" class = "bcolor" name = "office"></div><br>
		<div><label for="occupation">Occupation:</label><input type = "text" class = "bcolor" name = "occupation"></div><br>
	</div>		

	<div class="innerwrapper">
		<div class = "outliner"><h3>PLACEMENT INFORMATION</h3></div>
		<div><label for="Proposed Duration">Proposed Duration:</label><input type ="text" class = "bcolor" name = "duration"></div><br>
		<div><label for="Amount">Amount:</label><input type ="number" class = "bcolor" name = "amount"></div><br>
	</div>			
			
	<div class="innerwrapper">
		<div class = "outliner"><h3>PAYOUT DETAILS</h3></div>
		<div><label for="AccountNo">Account Number:</label><input type ="text" class = "bcolor" name = "acctnumba"></div><br>
		<div><label for="AccountName">Account Name:</label><input type ="text" class = "bcolor" name = "acctname"></div><br>
		<div><label for="AccountName">Name of Bank:</label><input type ="text" class = "bcolor" name = "bname"></div><br>
	</div>
						
	<div class="innerwrapper">
		<div class = "outliner"><h3>NEXT-OF-KIN DETAILS</h3></div>
		<div><label for="Name">Name:</label><input type ="text" class = "bcolor" name = "next"></div><br>
		<div><label for="PhoneNo">Phone Number:</label><input type = "number" class = "bcolor" name = "pnext"></div><br>
		<div><label for="EmailAddress">Email Address:</label><input type ="text" class = "bcolor" name = "email"></div><br>
	</div>

	<label for ="Reference">References:</label>
<select class= "intro" name = "ref" required>
<option selected="selected">--Select your referral--</option>
<?php
		$connection = new mysqli('localhost', 'root', '!19Globesiplet94!', 'vfd_fd');
		 $query = "SELECT Fullname FROM employeesportal WHERE Position ='Accounting Officer' ;";
		 $checker = $connection->query($query);
		 while($row = $checker->fetch_Assoc()){
			echo "<option value = '".$row['Fullname']."'>".$row['Fullname']."</option>";
		 }
		?>
</select>

 <br><br><center><button class = "submit" >Submit</button></center>

</form>
</div>
		 
</body>
</html>
