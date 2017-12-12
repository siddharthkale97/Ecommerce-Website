<?php
session_start();

$flag=0;
$dbconn= mysqli_connect('localhost','root','','ecom');
echo "Connected to database";
$username=$_POST['username'];
$pass=$_POST['password'];
echo $username;
echo $pass;
$q1="SELECT * from  login where email= '$username' ";
$sql1=mysqli_query($dbconn,$q1);
if(!$sql1){echo mysqli_error($dbconn);}
else{
	$row=mysqli_fetch_array($sql1);
	$password=$row['password'];
	if($password==$pass){ $flag=1;}
	echo "Verified";
}
//if($username=="" or $pass==""){header('Location:LoginPage.htm');}
if($flag==1)
{
$query="select CID from  userid where email='$username' ";
$res=mysqli_query($dbconn,$query);// or die('error in query');
if(!$res){echo mysqli_error($dbconn);}
else{
	$row=mysqli_fetch_array($res);
	$_SESSION['CID']=$row['CID'];
}
$cid=$_SESSION['CID'];
$query="select First_name,Last_name from customer where CID= '$cid'";
$res=mysqli_query($dbconn,$query);// or die('error in query');
if(!$res){echo mysqli_error($dbconn);}
else{
$row=mysqli_fetch_array($res);
	$_SESSION['fname']=$row['First_Name'];
	$_SESSION['lname']=$row['Last_Name'];
	header('Location:orderdetail.html');
	//header('Location:..\mainPage\mainPageasPHP.php');
}
}
else{
echo 'Incorrect username or password. Pls try again.';


}


?>

