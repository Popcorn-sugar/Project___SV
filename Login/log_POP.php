<?php
// Initial
$host="localhost"; // Host name 
$my_user='root'; // Mysql username 
$my_pass=''; // Mysql password 
$my_db='sv'; // Database name 
$table='login'; // Table name 

// Connect to server and select databse.
$link=mysqli_connect($host, $my_user, $my_pass, $my_db)or die('connection fail'); 
//mysqli_select_db($link,$db_name)or die("cannot select DB");

// username and password sent from form 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];
}

// To protect MySQL injection (more detail about MySQL injection)

////////////////////////////////////////////////////////////
$sql="SELECT Name FROM $table WHERE Username='$myusername' and Password='$mypassword'";
$result=mysqli_query($link, $sql);
var_dump($result);
// Mysql_num_row is counting table row

// If result matched $myusername and $mypassword, table row must be 1 row
$count=mysqli_num_rows($result);
if($count>0){
    while($row=$result->fetch_assoc()){
        echo "<br> Admin name is: ". $row["Name"] ;
    }
    mysqli_free_result($result);
}
else {
    echo "<br> Wrong Username or Password";
}

mysqli_close($link);
?>