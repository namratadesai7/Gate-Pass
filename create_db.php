<?php
session_start();
include('dbcon.php');
//ADD
if(isset($_POST['save'])){
    $ID=$_POST['ID'];
    $ctype=$_POST['ctype'];
    $Name=$_POST['Name'];
    $dept=$_POST['dept'];
    $approver=$_POST['approver'];

   $sql="INSERT INTO Fcoupon(Emp_ID,Coupon_Type,Emp_Name,Department,Approved_Name) VALUES('$ID', '$ctype','$Name', '$dept','$approver')";
   $run=sqlsrv_query($conn,$sql);

   if($run){
    ?>
    <script>   
     window.open('Fcoupon.php','_self');
     </script>
    <?php
   }else{
    print_r(sqlsrv_errors());
   }
}


//EDIT
if(isset($_POST['update'])){
    $ID=$_POST['ID'];
    $ctype=$_POST['ctype'];
    $Name=$_POST['Name'];
    $dept=$_POST['dept'];
    $approver=$_POST['approver'];
  $Sr=$_POST['Sr'];
  $sql="UPDATE Fcoupon SET Emp_ID='$ID',Coupon_Type='$ctype',Emp_Name='$Name',Department='$dept',Approved_Name='$approver' WHERE Sr = '$Sr'";
  $run=sqlsrv_query($conn,$sql);
  if($run){
    ?>
     <script>
            alert('updated Successfully');
            window.open('fcoupon.php','_self');
        </script>
        <?php
  }else{
    print_r(sqlsrv_errors());
}
}

if(isset($_POST['empid'])){
  $sql = "SELECT * FROM Pass where emp_id = '".$_POST['empid']."'";
  $run = sqlsrv_query($conn,$sql);
  $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);

  $data = array($row['emp_name'],$row['department']);
  
  echo json_encode($data);
}

if(isset($_POST['qty']) AND isset($_POST['rate']) ){
  $a=$_POST['qty'];
  $b=$_POST['rate'];
  $amt=$a*$b;
  $data=array($amt);
  
  echo json_encode($data);
}
 ?>