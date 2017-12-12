<?php 
  if(isset($_POST['submit'])){ 
  if(isset($_GET['go'])){ 
  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
  $name=$_POST['name']; 
  //connect  to the database 
  $db=mysql_connect  ("localhost", "username",  "password") or die ('I cannot connect to the database  because: ' . mysql_error()); 
  //-select  the database to use 
  $mydb=mysql_select_db("ecom"); 
  //-query  the database table 
  $sql="SELECT name,description,rating,price,manufacturer,stock FROM product WHERE name LIKE '%" . $name .  "%' OR type LIKE '%" . $name ."%'"; 
  //-run  the query against the mysql query function 
  $result=mysql_query($sql); 
  //-create  while loop and loop through result set 
  while($row=mysql_fetch_array($result)){ 
         $name  =$row['name']; 
         $description=$row['description']; 
         $rating=$row['rating'];
         $price=$row['price'];
         $manufacturer=$row['manufacturer'];
         $stock=$row['stock']; 
  //-display the result of the array 
  echo "<ul>\n"; 
  echo "<li>" . $name ." " .$description . " " . $rating ." ".$price." ".$manufacturer." ".$stock.  "</li>\n"; 
  echo "</ul>"; 
  } 
  } 
  else{ 
  echo  "<p>Please enter a search query</p>"; 
  } 
  } 
  } 
?> 