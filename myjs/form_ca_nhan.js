
// Cập nhật ảnh
window.addEventListener('load', function() {
  document.querySelector('input[type="file"]').addEventListener('change', function() {
      if (this.files && this.files[0]) {
          var img = document.querySelector('.avatar');  // $('img')[0]
          var box =  document.querySelector('#display_box');
          var FR= new FileReader();
          /*      This change the picture by a blob URL link  
          img.src = URL.createObjectURL(this.files[0]); // set src to blob url
          */
          
          /*      This change the picture by a Base64 URL link  */
          FR.addEventListener("load", function(e) {
          img.src       = e.target.result;
          box.innerHTML = e.target.result;
          document.getElementById('picture').value = e.target.result;
          }); 
          
          FR.readAsDataURL( this.files[0] );
          
          img.onload = imageIsLoaded;
      }
  });
});

function imageIsLoaded() { 
  console.log("Đang tải ảnh lên...");  
}

// Kiểm tra thông tin được nhập vào form
logout_var = false;
function logout() { 
  logout_var = true;
}

function validateFormCaNhan() {
  var error_text = '';
  var name = document.forms["submitForm"]["name"].value;
  var year = document.forms["submitForm"]["year"].value;
  var faculty = document.forms["submitForm"]["faculty"].value;
  var Email = document.forms["submitForm"]["Email"].value;
  var phone = document.forms["submitForm"]["phone"].value;
  if(isValidDate(year)=='false'){
    error_text += "Ngày tháng năm sinh không đúng hoặc không hợp lệ\n(Vui lòng chọn theo dạng YYYY-MM-DD)\n";
  }
  if (!isNaN(name) || name.match(/(\d+)/)) {
    error_text += "Tên không hợp (Không được chứa số)\n";
  }
  if (faculty == "Chọn khoa của bạn") {
    error_text += "Vui lòng chọn khoa\n";
  }
  if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Email)))
  {
    error_text += "Email không hợp lệ\n"
  }
  if (isNaN(phone)) {
    error_text += "Số điện thoại không hợp lệ ( Không được có chữ)\n";
  }
  if(logout_var)  {
    logout_var = false;
    if(confirm("Are you sure to logout?")){
      // alert("Đăng xuất thành công"); 
      document.getElementById("redirect_2").click();
      alert("Đăng xuất thành công");
      return false;
    }
    else alert("Không đăng xuất thì thôi !!!!!!!!!");
  }
  else {
    if(error_text == '') {
      alert("Thông tin đã được cập nhật"); 
      return true;
    }
    else  {
      alert(error_text);
      return false;
    }
  }
}

function isValidDate(date) {
    var x, text;
    x = date;

    if(!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(x))
        return('false');
	else {
    // Parse the date parts to integers
    var parts = x.split("-");
    var day = parseInt(parts[2], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[0], 10);
    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
      return('false');

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    if((day > 0 && day <= monthLength[month - 1])==false) return('false'); 
    }
};


function cutdown() {

  var phone = document.getElementById("phone");
  
  if (phone.value.length > 15) phone.value = phone.value.slice(0, 15);
  
}