<?php
session_start();
include('dbcon.php');
//ADD
if(isset($_POST['save'])){
    $mon=$_POST['mon'];
    $date=$_POST['date'];
    $vehno=$_POST['vehno'];
    $name=$_POST['name'];
    $itime=$_POST['itime'];
    $otime="-";


    $sql= "INSERT INTO vehicle(Month,Date,Vehicle_No,Name,Intime,CreatedBy) VALUES('$mon','$date','$vehno','$name','$itime','abc')";
    $run=sqlsrv_query($conn,$sql);

    if($run){
   ?>
   <script>
    window.open('vehicle.php','_self');
    </script> 
    <?php    
    }else{
        print_r(sqlsrv_errors());
    }
}
//GET
if(isset($_POST['update'])){
    $Sr=$_POST['Sr'];
    $mon=$_POST['mon'];
    $date=$_POST['date'];
    $vehno=$_POST['vehno'];
    $name=$_POST['name'];
    $itime=$_POST['itime'];
    $otime=$_POST['otime'];
    $odate=$_POST['odate'];

$sql="UPDATE vehicle SET Month='$mon', Date='$date', Vehicle_No='$vehno', Name='$name', Intime='$itime',Out_time='$otime',Out_date='$odate' WHERE Sr = '$Sr' ";
$run=sqlsrv_query($conn,$sql);
if($run){
    ?>
    <script>
        alert('updated successfully');
        window.open('vehicle.php','_self');
    </script>
    <?php
}else{
    print_r(sqlsrv_errors());
}
}   
?>