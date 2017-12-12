
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>
<?php 
  //connect  to the database 
$dbconn= mysqli_connect('localhost','root','','ecom');
  


  /*if(isset($_POST['submit'])){ 
  if(isset($_GET['go'])){ 
  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ */
  $name=$_POST['search']; 
  //-query  the database table 
  $sql="SELECT name,url FROM product WHERE name LIKE '%" . $name .  "%' OR type LIKE '%" . $name ."%'"; 
  //-run  the query against the mysql query function 
  $result=mysqli_query($dbconn,$sql); 
  if(mysqli_num_rows($result)>0){
  //-create  while loop and loop through result set 
  while($row=mysqli_fetch_array($result)){
          $name=$row['name'];
          $url=$row['url'];
          echo '<a href="'.$row['url'].'">'.$name.'</a><br>';
  } 
  }
  else
  {
   echo "No results found";
   }
   /*
   }
  else{ 
  echo  "<p>Please enter a search query</p>"; 
  } 
}
}*/

?> 

