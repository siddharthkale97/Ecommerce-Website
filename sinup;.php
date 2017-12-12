<?php
// Connecting to database
$link = mysql_connect($wgScriptsDBServerIP, $wgScriptsDBServerUsername, $wgScriptsDBServerPassword, true);
if(!$link || !@mysql_SELECT_db($wgScriptsDBName, $link)) {
echo("Cant connect to server");
    exit;
}

// Values to insert
$name = 'John Smith';
$weight = 83;
$height = 185;

// insertion to user table
$sql = "INSERT INTO user (name) VALUES ('$name')";
$result = mysql_query( $sql,$conn );
// retrieve last id
$user_id = mysql_insert_id( $conn );
mysql_free_result( $result );

// insertion to user_details table
$sql = "INSERT INTO user_details (id, weight, height) VALUES ($user_id, $weight, $height)";
$result = mysql_query( $sql,$conn );
mysql_free_result( $result );
?>