<?php
    require_once("query.php");
    // From login.php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
        $myusername=htmlentities($_POST['username']);
        $mypassword=htmlentities($_POST['password']);
        $mytype = htmlentities($_POST['type']);
        
        // Check if correct
        $sql="SELECT login.mssv, info.name FROM login INNER JOIN info ON login.mssv = info.mssv WHERE login.username='$myusername' AND login.password='$mypassword' AND login.type='$mytype' ";
        $result=query_value($sql);
        // var_dump($result);
        $count= $result->num_rows;
        // Save information
        if($count==1){  
            $row=$result->fetch_assoc();
            $_SESSION['type'] = $mytype;
            $_SESSION['mssv'] = $row['mssv'];
            
        }
        else {
            $_SESSION['type'] = $mytype;
            $_SESSION['mssv'] = 'none';
        }
        $error ="";
    }
    else {
        $error ="Có lỗi rồi";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Center the loader */
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 } 
        to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom { 
        from{ bottom:-100px; opacity:0 } 
        to{ bottom:0; opacity:1 }
    }

    #myDiv {
        display: none;
        text-align: center;
    }
</style>
</head>
<body onload="myFunction()" style="margin:0;">

    <div id="loader"></div>

    <div style="display:none;" id="myDiv" class="animate-bottom">
    </div>

    <a id="redirect" href="
        <?php 
            // Redirect
            if($_SESSION['mssv'] == 'none') { echo 'login.php';}
            else if($_SESSION['type'] === 'admin') { echo 'form_tra_cuu.php';} 
            else {echo 'form_ca_nhan.php';} ?>">
    </a>


    
    <script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 500);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
        document.getElementById('redirect').click();
    }
    </script>

    <?php    
        // Announce
        if($_SESSION['mssv'] == 'none')  echo "<script type='text/javascript'>alert('Sai mật khẩu hoặc chọn sai người dùng');</script>";
        else {
            $message = $row['name'];
            echo "<script type='text/javascript'>alert('Welcome $message');</script>";
        }
    ?>

</body>
</html>