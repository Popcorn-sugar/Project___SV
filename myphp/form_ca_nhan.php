<?php
    require_once('query.php');
    
    // Take saved value
    $mytype = $_SESSION['type'];
    $mymssv = $_SESSION['mssv'];
    // Nếu là người lạ thì pp
    if(!($mytype == 'admin' || $mytype == 'student')) header("location:logout.php");
    else {
    // Update value when you press Submit button
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['action'])) {
        $myname=$_POST['name'];
        $mymssv=htmlentities($_POST['mssv']);
        $mybirthday=htmlentities($_POST['year']);
        $myfaculty = $_POST['faculty'];
        $myemail=htmlentities($_POST['Email']);
        $myphone = htmlentities($_POST['phone']);
        $mypicture = $_POST['picture'];
        $sql="UPDATE info SET name = '$myname', birthday = '$mybirthday', faculty = '$myfaculty', email = '$myemail', phone= '$myphone', picture = '$mypicture' WHERE mssv = $mymssv";
        query($sql);
    }
    

    // If you link from bang_tra_cuu form you need to take mssv from there
    if(isset($_POST['action']))  { 
        $mymssv = $_POST['action'];
        $_SESSION['mssv'] = $mymssv;
    }

    // Display the value of selected student
    $sql="SELECT i.mssv,i.name,i.birthday,i.faculty,i.email,i.phone,i.picture
    FROM info as i
    WHERE i.mssv=$mymssv ";
    $result=query_value($sql);
    $count=$result->num_rows;
    // Default value
    $myname='';
    $mymssv=0000000;
    $mybirthday=2000-01-01;
    $myfaculty = '';
    $myemail='';
    $myphone = '';
    $mypicture = '';
    // If student exist their information will be display 
    if($count==1){
        $row=$result->fetch_assoc();
        // var_dump($row);
        $myname=$row['name'];
        $mymssv=$row['mssv'];
        $mybirthday=$row['birthday'];
        $myfaculty = $row['faculty'];
        $myemail=$row["email"];
        $myphone = $row["phone"];
        $mypicture = $row['picture'];
    }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../mycss/form_ca_nhan.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <div id="row"  class="header" style="margin-top: 5%;">
        <p style="text-align: center;"><img src="../Image/logo.png" style="width: 50px; height: 50px; margin-top: 40px;"></img></p>
        <h1 style="text-align: center;">ĐẠI HỌC BÁCH KHOA THÀNH PHỐ HỒ CHÍ MINH</h1>
    </div>

    <div id="row">
        <div class="col left">
        <p><img src="<?php echo $mypicture;?>" class="avatar" ></img></p><br>
            <input  type='file' accept="image/*" id="avatar" name="avatar"  style="display: none">
            <label for="avatar" id="avatar_button">Cập nhật</label>
            <p id="display_box" style="display:none"></p>
        </div>

        <div class="col right" style=" height: fit-content;">
            <form name="submitForm" action="" method="post" onsubmit="return validateFormCaNhan()">
            <fieldset  class="box" style="overflow: hidden;height: fit-content;">
                <legend>Thông tin sinh viên:</legend><br><br>
                <!-- Name -->
                <label for="name">Họ và tên</label>
                <input type="text" id="name" name="name" maxlength="30" autocomplete="off" value=<?php echo "'$myname'";?>><br><br>
                <!-- MSSV -->
                <label for="mssv">MSSV</label>
                <input type="text" id="mssv" name="mssv" autocomplete="off" readonly value=<?php echo $mymssv; ?>><br><br>
                <!-- birthday -->
                <label for="year">Năm sinh</label>
                <input type="text" id="year" name="year" autocomplete="off"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" oninvalid="this.setCustomValidity('Nhập theo định dạng YYYY-MM-DD bạn nhé')" oninput="this.setCustomValidity('')" value=<?php echo $mybirthday;?>><br><br>
                <!-- Faculty -->
                <label for="faculty">Khoa</label>
                <select name="faculty" id="faculty" style="float:right; width: 70%; padding: 2px; border: 1px solid black; ">
                    <option value="<?php echo $myfaculty;?>" selected hidden><?php echo $myfaculty;?></option>
                    <option value="Điện - điện tử">Điện - điện tử</option>
                    <option value="Máy tính">Máy tính</option>
                    <option value="Cơ khí">Cơ khí</option>
                    <option value="Hoá học">Hoá học</option>
                    <option value="Xây dựng">Xây dựng</option>
                </select><br><br>
                <!-- Email -->
                <label for="Email" autocomplete="off" >Email</label>
                <input type="text" id="Email" name="Email"  maxlength="30" autocomplete="off" value=<?php echo $myemail;?>><br><br>
                <!-- SDT -->
                <label for="phone">Số điện thoại</label>
                <input type="number" id="phone" name="phone"  maxlength="15" oninput="cutdown()" value=<?php echo $myphone;?>><br><br>
                <!-- Hidden value  for picture value  -->
                <input type="text" id="picture" name="picture" style="display:none" value="<?php echo $mypicture;?>"><br><br>
                <p style="text-align:center; float: left; width: 40%; margin: 0 5% 0 5%;<?php if($mytype == 'admin') echo 'width:70%;';?>" ><input id="avatar_button" type="submit" float></p>
                <p style="text-align:center; float: right; width: 40%; margin: 0 5% 0 5%;" ><input id="avatar_button" type="submit" value="Logout" style=<?php if($mytype == 'admin') echo "'display:none;'";?> formaction='logout.php' onclick="logout()" float></p>
                
            </form>
        </div>
    </div>
    <a id="redirect_2" href="logout.php" style="display:none"></a>
    <!--        Script Area         -->
    <script src="../myjs/form_ca_nhan.js"></script>
</body>
</html>