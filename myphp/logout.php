<?php 
    session_start();

    $mymssv ='';
    $myname='';
    $mybirthday='';
    $myfaculty = '';
    $myemail='';
    $myphone = '';
    $mytype = '';
    $_SESSION['myname'] = $myname;
    $_SESSION['mymssv'] = $mymssv;
    $_SESSION['mybirthday'] = $mybirthday;
    $_SESSION['myfaculty'] = $myfaculty;
    $_SESSION['myemail'] = $myemail;
    $_SESSION['myphone'] = $myphone;
    $_SESSION['mytype'] = $mytype;
    
    session_destroy();
    header("location:index.php");

?>