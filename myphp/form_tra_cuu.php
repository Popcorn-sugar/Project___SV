<?php
    require_once('query.php');
    // take type of user
    
    if(isset($_SESSION['type'])) $mytype = $_SESSION['type'];
    else $mytype = '';
    // If you are student this is not your place
    if($mytype != 'admin'){

        header("location:logout.php");
    }    
    else {
    // If you are admin
    // from search button
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && $_POST['temp']=='search') {
            // Init value
            $mymssv ='';
            $myname='';
            $mybirthday='';
            $myfaculty = ' ';
            $myemail='';
            $myphone = '';
            $mytype = '';
            // Take value
            if (isset($_POST['name'])) $myname=$_POST['name'];
            if (isset($_POST['mssv'])) $mymssv=htmlentities($_POST['mssv']);
            if (isset($_POST['year'])) $mybirthday=htmlentities($_POST['year']);
            if (isset($_POST['faculty'])) $myfaculty = $_POST['faculty'];
            if (isset($_POST['Email'])) $myemail=htmlentities($_POST['Email']);
            if (isset($_POST['phone'])) $myphone = htmlentities($_POST['phone']);
            // Take search value
            $_SESSION['myname'] = $myname;
            $_SESSION['mymssv'] = $mymssv;
            $_SESSION['mybirthday'] = $mybirthday;
            $_SESSION['myfaculty'] = $myfaculty;
            $_SESSION['myemail'] = $myemail;
            $_SESSION['myphone'] = $myphone;
        }
        else  {
        // Import last search value
            if(isset($_SESSION['myname'])) $myname = $_SESSION['myname'];   else $myname = ''; 
            if(isset($_SESSION['mymssv'])) $mymssv = $_SESSION['mymssv'];   else $mymssv = ''; 
            if(isset($_SESSION['mybirthday'])) $mybirthday = $_SESSION['mybirthday'];   else $mybirthday = ''; 
            if(isset($_SESSION['myfaculty'])) $myfaculty = $_SESSION['myfaculty'];   else $myfaculty = ''; 
            if(isset($_SESSION['myemail'])) $myemail = $_SESSION['myemail'];   else $myemail = ''; 
            if(isset($_SESSION['myphone'])) $myphone = $_SESSION['myphone'];   else $myphone = ''; 
        }
        // Search follow the search value
        $sql="SELECT * FROM info  WHERE name LIKE '%".$myname."%'AND mssv LIKE '%".$mymssv."%' AND birthday LIKE '%".$mybirthday."%' AND faculty LIKE '%".$myfaculty."%' AND email LIKE '%".$myemail."%' AND phone LIKE '%".$myphone."%' ORDER BY mssv ASC;";
        $result=query_value($sql);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../mycss/form_tra_cuu.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body >
<!-- if you are student we will return you back to your place -->
<a style='display:none' id='redirect' href='login.php'>aaa</a>

<!-- Start page -->
<div id="container" >
    <div id="header" style="display: block;">
        <div id="topnav" >
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li><a href="#content">Tra cứu</a></li>
                <li><a href="logout.php" onclick="return confirm('Are you sure to logout?')">Đăng xuất</a></li>
                <li><a href="">Đổi mật khẩu</a></li>
            </ul>
        </div>
    </div>

    <div id="content"  >
        <div class="search_area" style="display: block;">
            <form  action="" method="post" >
                <fieldset >
                    <legend >Thông tin cần tìm </legend><br><br>
                    <label for="name" >Họ và tên</label>
                    <input type="text" id="name" name="name" maxlength="30" value="<?php echo $myname;?>" autocomplete="off">
                    <label for="mssv">MSSV</label>
                    <input type="number" id="mssv" name="mssv" value="<?php echo $mymssv;?>" autocomplete="off">
                    <label for="year">Năm sinh</label>
                    <input type="text" id="year" name="year" placeholder="YYYY-MM-DD"  value="<?php echo $mybirthday;?>" autocomplete="off">
                    
                    <label  for="Email" autocomplete="off">Email</label>
                    <input maxlength="40" value="<?php echo $myemail;?>" type="text" id="Email" name="Email" autocomplete="off" onclick="changecolor()">
                    <label for="phone">Số điện thoại</label>
                    <input type="number" id="phone" name="phone" maxlength="11" value="<?php echo $myphone;?>" autocomplete="off" >
                    <input type="text" id="temp" name="temp" value="search" style="display:none">
                    <label for="faculty">Khoa</label>
                    <select  name="faculty" id="faculty">
                        <option value="<?php echo $myfaculty;?>" selected disable hidden><?php echo $myfaculty;?></option>
                        <option value="">Tất cả</option>
                        <option value="Điện - điện tử">Điện - điện tử</option>
                        <option value="Máy tính">Máy tính</option>
                        <option value="Cơ khí">Cơ khí</option>
                        <option value="Hoá học">Hoá học</option>
                        <option value="Xây dựng">Xây dựng</option>
                    </select>
                    <p><input type="submit" id="button" value="Tìm kiếm" for="text" float style="text-align:center; float:none; width: 80px; height: 25px; padding:3px 10px 10px 10px;" ></p>
                </fieldset>       
            </form>
        </div>
        
        
        
        <form id="myform" action="delete.php" method="post" target="_blank" onsubmit="return formSubmit()">    <!-- Check if delete button was press  -->
            <input type="submit" onclick="setDelete()" value="Xoá" id="button" style="width: 73px; float:right; margin: 5px; margin-right:5% ; display: block;" for="form" >
            <a id="button" href="register.html" style="float: right; width: fit-content; margin: 5px; display: block;">Tạo mới</a>
            <div id="table_wrap">
            <div class="search_button" style="display: block;">
            <h1 style="text-align: center; margin:0"> Danh sách thông tin tìm được</h1>
            <br><br>
            </div>
            <table >
                <div>         
                <tr class="sticky">
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>MSSV</th> 
                    <th>Năm sinh</th>
                    <th>Khoa</th> 
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Chi tiết</th>
                    <th >Xoá</th>
                </div>   
                </tr>  
                <?php 
                $count = 0;
                if($result) {
                while($row = $result->fetch_assoc()){
                    if($row['name'] == 'admin') {continue;}
                       //Creates a loop to loop through results
                    $count++;
                    echo  "<tr class='show'>
                        <td><b>".$count."</b></td>
                        <td>".$row['name']."</td>
                        <td>".$row['mssv']."</td> 
                        <td>".$row['birthday']."</td>
                        <td>".$row['faculty']."</td> 
                        <td>".$row['email']."</td>
                        <td>".$row['phone']."</td>
                        <td class='hide'><button type='submit' formaction='form_ca_nhan.php' name='action' value='".$row['mssv']."'  >Chi tiết</button></td>
                        <td><input type='checkbox' id='hang' name='".$count."' value='".$row['mssv']."'></td>
                        </tr>";
                }}
            else {
                for($i=0;$i<=2;$i++){
                    $count++;
                    echo    "<tr class='show'>
                            <td><b>".$count."</b></td>
                            <td></td>
                            <td></td> 
                            <td></td>
                            <td></td> 
                            <td></td>
                            <td></td>
                            <td class='hide'><button>Chi tiết</button></td>
                            <td><input type='checkbox'></td>
                            </tr>";
                }}                
                ?>
            </table>
            <input type="text" name="count"  id="count" value="<?php echo $count;?>" style="display:none">
            <input type="text" name="temp"  id="temp" value="delete" style="display:none">
        </div>
        </form>
    </div>

    <div class="search_button" style="display: block;">
        <br><br>
        <h1 style="text-align: center; margin:0"> --End-- </h1>
        <br><br>
        </div>
    


    <script src="../myjs/form_tra_cuu.js"></script>
</div>
</body>
</html>
