<!DOCTYPE html>
<html>
<body>
    <a id="redirect_1" href="register.html"></a>
    <a id="redirect_2" href="login.php"></a>
    <a id="redirect_2" href="logout.php"></a>
</body>
</html>



<?php
    require_once("query.php");
    // From login.php
    if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
        $myusername=htmlentities($_GET['username']);
        $mypassword=htmlentities($_GET['password']);
        $myname=htmlentities($_GET['name']);
        $mybirthday=htmlentities($_GET['year']);
        $myfaculty = $_GET['faculty'];
        $myemail=htmlentities($_GET['Email']);
        $myphone = htmlentities($_GET['phone']);
        $mypicture = $_GET['picture'];
        // Check if exist
        $sql="SELECT mssv FROM login WHERE username='$myusername'";
        $result=query_value($sql);
        //var_dump($result);
        $count= $result->num_rows;
        
        if($count==1){  // Đã có tài khoản đó rồi
            echo "<script> alert('Tài khoản đã tồn tại vui lòng chọn tài khoản khác');  
            document.getElementById('redirect_1').click();</script>";
        }
        else {  // Chưa ai tạo tài khoản đó
            $sql="INSERT INTO login(username, password) VALUES ('$myusername','$mypassword');";
            query($sql);
            $sql="INSERT INTO info(name, birthday, faculty, email, phone, picture) VALUES ('$myname', '$mybirthday', '$myfaculty','$myemail', '$myphone', '$mypicture')";
            query($sql);
            echo "<script> alert('Đăng ký thành công, vui lòng đăng nhập để xem thông tin'); document.getElementById('redirect_2').click(); </script>";
        }
        
    }
    else {
        echo "<script> document.getElementById('redirect_2').click(); </script>";
    }
?>