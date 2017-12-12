<?php

session_start();

$dbconn= mysqli_connect('localhost','root','','ecom');
if($dbconn){echo("Connected to database");}
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$qty=$_POST['quantity'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pincode'];
$phn=$_POST['phonenumber'];
$cid=$_SESSION['CID'];
$sql= "insert into orders(First_name,Last_name,quantity,CID) values('$firstname','$lastname','$qty','$cid')";
$res=mysqli_query($dbconn,$sql);
if(!$res){echo mysqli_error($dbconn);}

$sql="select order_id from orders where First_name='$firstname' and Last_name='$lastname'";
$res=mysqli_query($dbconn,$sql);
if(!$res){echo mysqli_error($dbconn);}
$row=mysqli_fetch_array($res);
$oid=$row['order_id'];

$sql="insert into order_contacts(order_id,phone_no) values('$oid','$phn')";
$res=mysqli_query($dbconn,$sql);//or die('error in query2');
if(!$res){echo mysqli_error($dbconn);}


$sql="insert into order_address(pincode,street,city,state) values('$pin','$street','$city','$state')";
$result=mysqli_query($dbconn,$sql) ;//or die('error in query3');
if(!$result){echo mysqli_error($dbconn);}
$sql1="insert into oid_pin(order_id,pincode) values('$oid','$pin')";
$result1=mysqli_query($dbconn,$sql1);//or die('error in query3');
if(!$res){echo mysqli_error($dbconn);}

$url=$_SESSION['url'];
$sql="select PID,price,name from product where url='$url'";
$res=mysqli_query($dbconn,$sql);//or die('error1');
if(!$res){echo mysqli_error($dbconn);}
$row=mysqli_fetch_array($res);
$price=$row['price'];
$_SESSION['name']=$row['name'];
$_SESSION['pid']=$row['PID'];
$pid=$_SESSION['pid'];
$name=$_SESSION['name'];/*

$sql="insert into views(PID,CID) values('$pid','$cid')";
$res=mysqli_query($dbconn,$sql);
if(!$res){echo "error"; echo mysqli_error($dbconn);}*/

$total=$price*$qty;
$sql="insert into total_amount(order_id,Total_amount) values('$oid','$total')";
$res=mysqli_query($dbconn,$sql);
if(!$res){echo "error1";echo mysqli_error($dbconn);}

if($total>="20000"){

	$dis="0.10";
}elseif($total>="10000") {
	$dis="0.05";

}else{
	$dis="0";
}

$sql="select Total_amount from total_amount where Total_amount='$total'";
$res=mysqli_query($dbconn,$sql);
if(mysqli_num_rows($res)==0){

$sql="insert into discount(Total_amount,discount) values('$total','$dis')";
$res=mysqli_query($dbconn,$sql);
if(!$res){echo "error2";echo mysqli_error($dbconn);}
}

$_SESSION['net_amount']=$total-($total*$dis);
$_SESSION['oid']=$oid;

header('Location:bill.php');
?>