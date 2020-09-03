<?php
    // Init value
    define("host",'localhost');
    define("my_user",'root');
    define("my_pass",'');
    define("my_db",'sv');
    
    session_start();
    
    $GLOBALS['a'] = 'notyet';
    // one time define
    if($GLOBALS['a']== 'notyet'){
    //Init value for sesstion
        $mymssv ='';
        $myname='';
        $mybirthday='';
        $myfaculty = '';
        $myemail='';
        $myphone = '';

        $_SESSION['myname'] = $myname;
        $_SESSION['mymssv'] = $mymssv;
        $_SESSION['mybirthday'] = $mybirthday;
        $_SESSION['myfaculty'] = $myfaculty;
        $_SESSION['myemail'] = $myemail;
        $_SESSION['myphone'] = $myphone;
        $GLOBALS['a'] ='ok';
    }