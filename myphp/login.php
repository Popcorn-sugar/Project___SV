<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../mycss/login.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div id="container">
    <!-- Box 1-->
    <div id="box" class="box1" style="display: block;" >
        <form class="modal-content" name="demo" ><!-- Đổi thành form-->
            <div class="imgcontainer">
                <img src="../Image/logo.png" width="20%" height="20%" class="avatar"></img>
            </div>
            <div id="content">
                <p>Who are you ?</p><br>
                <input type="radio" id="admin" name="user" value="admin" checked>
                <label for="admin">Admin</label><br>
                <input type="radio" id="student" name="user" value="student">
                <label for="student">Student</label><br><br>
                <button type="button" onclick="Dis2()" >Confirm</button>
            </div>
        </form>
    </div>
    <!-- Box 2-->
    <div id="box"  class="box2" style="display: none ;" >
        <form class="modal-content" action="../myphp/loader.php" method="post">
            <div class="imgcontainer">
                <span onclick="Dis1()" class="close">x</span>
                <img src="../Image/logo.png" width="20%" height="20%" class="avatar"></img>
            </div>
            <div id="content">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" id="myUsername" name="username" maxlength="30" required oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" id="myPassword" name="password" maxlength="30" required oninvalid="this.setCustomValidity('Enter Password Here')" oninput="this.setCustomValidity('')">
                <input type="checkbox" onclick="showPassword()">Show password </input>
                <!-- hidden value-->
                <input type="text" id="type" name="type" style="display:none">
                <button type="submit" >Login</button>
                <label>
                <input type="checkbox"  name="remember"> Remember me
                </label>
            </div>
            <div id="content" style="background-color:#f1f1f1">
                <p><a href="register.html" >Chưa có password ?</a></p>
            </div>
        </form>
    </div>
    </div>

<!--        Script Area         -->
<script src="../myjs/login.js"></script>

</body>
</html>
