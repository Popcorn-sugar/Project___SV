<?php
    require_once('query.php');
    // If you click on delete button and there are check values
    $count = $_POST['count'];
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $count != 0 ) {
        for($i=1;$i <= $count;$i++){
            if(isset($_POST[$i])){
            $mssv = $_POST[$i];
            echo $mssv;
            $sql="DELETE FROM info WHERE mssv = $mssv;";
            $result=query($sql);
            $sql="DELETE FROM login WHERE mssv = $mssv;";
            $result=query($sql);
        }}
    }
?>

<!DOCTYPE html>
<html>
<body onload="myFunction()">

    <form id="myform" action="form_tra_cuu.php" method="get">
        <input type="text" id="temp" name="temp" value="delete_form" style="display:none">
        <input type="submit" value="Submit" style="display:none">
    </form>
    
    <a id="redirect" href="
        <?php 
            echo 'form_tra_cuu.php';
            ?>">
    </a>

    <script>

    function myFunction() {
        myVar = setTimeout(showPage, 0);
    }

    function showPage() {
        var form = document.getElementById('myform');
        form.submit();
        // document.getElementById('redirect').click();
    }
    </script>
</body>
</html>