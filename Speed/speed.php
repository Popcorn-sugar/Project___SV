<!DOCTYPE html>
<html>
<body>
    <a id="redirect_1" href="speed.html"></a>
</body>
</html>


<?php
    require_once("query.php");
    // From login.php
    if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
        $myusername=htmlentities($_GET['username']);
        $mypassword=htmlentities($_GET['password']);
        $myname=$_GET['name'];
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
            $sql="INSERT INTO info(name) VALUES ('$myname')";
            query($sql);
            echo "<script> alert('Đăng ký thành công, vui lòng đăng nhập để xem thông tin'); document.getElementById('redirect_1').click(); </script>";
        }
        
    }
    else {
        echo "<script> document.getElementById('redirect_1').click(); </script>";
    }
?>