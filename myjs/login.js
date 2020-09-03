box1 = document.querySelector('.box1');
box2 = document.querySelector('.box2');

function noPassword() {
    alert("Vui lòng liên lạc với phòng đào tạo");  
}
// Hiện bảng đăng nhập
function Dis2 (){
    box1.style.display = "none";
    box2.style.display = "block";
    const form = document.forms.demo;
    const checked = form.querySelector('input[name="user"]:checked');

    document.getElementById('type').value = checked.value;
}
// Tắt bảng đăng nhập
function Dis1 () {
    box1.style.display = "block";
    box2.style.display = "none";
    
}
// Hiện mật khẩu đang nhập
function showPassword () {
    var x = document.getElementById("myPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// Check mật khẩu không database
/*
function Login() {
    
    if((document.getElementById('myPassword').value == 'admin') && (document.getElementById('myUsername').value == 'admin') && (document.querySelector('input[name="user"]:checked').value == 'admin')){
        window.location.href = '../Bang_tra_cuu/form_tracuu.html';
    }
    else if((document.getElementById('myPassword').value == 'hocsinh') && (document.getElementById('myUsername').value == 'hocsinh') && (document.querySelector('input[name="user"]:checked').value == 'student')) {
        window.location.href = '../Bang_ca_nhan/form.html';
    }  
    else alert("Sai mật khẩu hoặc tài khoản không tồn tại");  
    
}
*/