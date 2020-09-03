<?php
// Initial
$host='localhost'; // Host name 
$my_user='root'; // Mysql username 
$my_pass=''; // Mysql password 
$my_db='sv'; // Database name 
$table='login'; // Table name 

// Connect to server and select databse.
$mysqli = new mysqli($host, $my_user, $my_pass, $my_db);
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
mysqli_set_charset($mysqli,"utf8");

//mysqli_select_db($link,$db_name)or die("cannot select DB");

// username and password sent from form 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myname=$_POST['name'];
    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];
    $mytype=$_POST['type'];
}

// To protect MySQL injection (more detail about MySQL injection)
if($myname && $myusername && $mypassword && $mytype){
////////////////////////////////////////////////////////////
$sql="INSERT INTO $table(name, username, password, type) VALUES('$myname', '$myusername', '$mypassword', '$mytype')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
}
else {echo "Full all box please !!!";}
$mysqli -> close();
?>