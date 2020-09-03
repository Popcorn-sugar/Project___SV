// Sticky
window.onscroll = function() {myFunction()};
    
var header = document.getElementById("header");
var sticky = header.offsetTop;
    
function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
    header.classList.remove("sticky");
    }
}

var var_setDelete = false;
function setDelete() {
    var_setDelete = true;
    
}

var form = document.getElementById('myform');
function formSubmit() {
    if(var_setDelete){
        form.target = '_parent';
        var_setDelete = false;
        if(confirm("Bạn muốn xoá những sinh viên đã chọn ?"))   return true;
        else {
            form.target = '_blank';
            return false;
        }
    }
}