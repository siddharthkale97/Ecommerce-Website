<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<style type="text/css">
		body{
    		margin:0;
   			padding:0;	
			min-width:1200px;;
			font-family:Arial,Helvetica;
			}
		#logobar{
        	background-color:#fa0740;
		 	width:100%;
		 	margin:0 auto;
		 	height:100px;
		} 
		#logo
		{
			
			color: #ffffff;
			float: left;
			margin-top: 5px;
			padding-right: 20px;
			margin-left: 5px;
		}
		
		#tagline
		{
			float: right;
			margin-top: 35px;

		}
		#tagline123
		{
		
			position:relative;
			margin-left:10px;
			color:#ffffff;
			padding-right:50px;
		}
		#S123{
			float: center;
			height: 400px;
			width: 500px;
			border: 2px solid black;
			margin-top: 40px;
			margin-left: 600px;
			padding-left: 20px;
		}
		button{
			background-color: #fa0740;
			border-radius: 8px;
			color: white;
			float: center;
			height: 40px;
			margin-left: 770px;
			margin-top: 40px;
		}
	</style>
</head>
<body>
<div id="logobar">
		<span id="logo"><h1><B>CLICK   SHOP</B></h1></span>
		<div id="tagline">
			<span id="tagline123"><b>CLICK<b> to get the <b>BEST</b></span>
		</div>
	</div>
<div id="S123">

	<h3><?php
session_start();

$dbconn= mysqli_connect('localhost','root','','ecom');

$net=$_SESSION['net_amount'];
$oid=$_SESSION['oid'];
$sql="insert into bill(net_amount,order_id) values('$net','$oid')";
$res=mysqli_query($dbconn,$sql);
if(!$res){echo mysqli_error($dbconn);}

$sql="select * from bill where order_id='$oid'";
$res=mysqli_query($dbconn,$sql);
$row=mysqli_fetch_array($res);
$billno=$row['Bill_id'];
$net=$row['net_amount'];
$oid=$row['order_id'];
$sql="select First_name,Last_name from orders where order_id='$oid'";
$res=mysqli_query($dbconn,$sql);
if(!$res){echo mysqli_error($dbconn);}
$row=mysqli_fetch_array($res);
$fname=$row['First_name'];
$lname=$row['Last_name'];

$name=$_SESSION['name'];
echo "Congratulations! Your order has been successfully placed.<br/><br/>Order Details:-<br/>";echo"<br/>Product Name:- "; echo $name;echo"<br/>Order Id:- ";echo $oid;echo"<br/>Bill Reference Number:- ";echo $billno;echo"<br/>Reciever's Name:- ";echo $fname;echo " ";echo $lname;echo"<br/>Payable Amount(Inclusive of all taxes):- ";echo $net;echo"<br/>";
?></h3>

</div>
<a href="mainPage.htm"><button> GO BACK TO HOME PAGE</button></a>
</body>
</html>
