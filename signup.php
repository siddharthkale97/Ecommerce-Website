<?php
$dbconn= mysqli_connect('localhost','root','','ecom');
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$phn=$_POST['phn'];

$email=$_POST['email'];
$_SESSION['uemail']=$email;
$pass=$_POST['password'];

$query="insert into customer(First_Name,Last_Name) values('$firstname','$lastname')";
$res=mysqli_query($dbconn,$query) or die('error in query1');

$sql="select CID from customer where First_Name like '%".$firstname."%' and Last_Name like '%".$lastname."%'";
$result=mysqli_query($dbconn,$sql)or die('error in query 5');
$row=mysqli_fetch_array($result);
$cid=$row['CID'];
$_SESSION['CID']=$cid;
$sql="insert into userid(CID,email) values('$cid','$email')";
$res=mysqli_query($dbconn,$sql);//or die('error in query2');
if(!$res){echo mysqli_error($dbconn);}

$sql="insert into login(email,password) values('$email','$pass')";
$res=mysqli_query($dbconn,$sql);//or die('error in query3');
if(!$res){echo mysqli_error($dbconn);}
$sql="insert into customer_contacts(CID,phone_no) values('$cid','$phn')";
$result=mysqli_query($dbconn,$sql);
if(!$result){echo mysqli_error($dbconn);}

$sql="insert into customer_address(pincode,street,city,state) values('$pin','$street','$city','$state')";
$result=mysqli_query($dbconn,$sql) ;//or die('error in query3');
if(!$result){echo mysqli_error($dbconn);}
$sql1="insert into cid_pin(CID,pincode) values('$cid','$pin')";
$result1=mysqli_query($dbconn,$sql1);//or die('error in query3');
if(!$res){echo mysqli_error($dbconn);}


header('Location:orderdetail.html');
?>
