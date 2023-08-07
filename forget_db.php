<?php
include('dbcon.php');
if(isset($_POST['forget'])){
$npwd=$_POST['npwd'];
$cpwd=$_POST['cpwd'];
$token=$_POST['token'];

if($npwd==$cpwd){
    $sql="UPDATE Pass SET Password='$npwd' where reset_token_hash = '$token'";
    $run=sqlsrv_query($conn,$sql);

    if($run){
        ?>
        <script>
            alert("pwd updated!!login again");
            window.open('index.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }
}
}


