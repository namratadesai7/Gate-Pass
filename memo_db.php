<?php
session_start();
include('dbcon.php');
//ADD
if(isset($_POST['save'])){
    //head part
   $loc=$_POST['loc'];
   $date=$_POST['date'];
   $name=$_POST['name'];
   $dept=$_POST['dept'];
   //detail part
   $mat=$_POST['mat'];
   $qty=$_POST['qty'];
   $rate=$_POST['rate'];
   $amt=$_POST['amt'];
   
$sql1="SELECT MAX(Sr) as 'num' FROM Memohead";
$run1 =sqlsrv_query($conn,$sql1);
$row1=sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC);
$count=$row1['num']+1;

$sql="INSERT INTO Memohead(Sr,Location,Date,Name,Department) VALUES( '$count','$loc',' $date','$name','$dept')" ;
$run= sqlsrv_query($conn,$sql);
if($run){
foreach ($qty as $key => $value) {
    $sql2="INSERT INTO Memodetail(Material,Quantity,Rate,Amount,head_id) VALUES('".$mat[$key]."','".$value."','".$rate[$key]."','".$amt[$key]."','$count' )";
    $run2=sqlsrv_query($conn,$sql2);
}    
if($run2){
    ?>
    <script>
        window.open('memo.php','_self');
        alert('done');
    </script>
    <?php
}else{
        print_r(sqlsrv_errors());
}
}
else{
    echo 'error for first if';
    print_r(sqlsrv_errors());
}}
//EDIT

if(isset($_POST['update'])){
   //head part
   $Sr=$_POST['headSr'];
   $loc=$_POST['loc'];
   $date=$_POST['date'];
   $name=$_POST['name'];
   $dept=$_POST['dept'];
   //detail part
   $mat=$_POST['mat'];
   $qty=$_POST['qty'];
   $rate=$_POST['rate'];
   $amt=$_POST['amt'];
   $detailSr =$_POST['detailSr'];


    $sql="UPDATE Memohead SET Location='$loc', Date='$date' ,Name='$name', Department='$dept' WHERE Sr = '$Sr' ";
    $run=sqlsrv_query($conn,$sql);

    foreach ($qty as $key => $value) {
        $sql1= "UPDATE Memodetail SET  Material='".$mat[$key]."',Quantity='".$value."', Rate ='".$rate[$key]."', Amount='".$amt[$key]."' where Sr = '".$detailSr[$key]."'";
        $run1=sqlsrv_query($conn,$sql1);
    }

    if($run && $run1){
        ?>
        <script>
            alert('updated Successfully');
            window.open('memo.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }
}

  


if(true){
    $sql = "SELECT * FROM Pass where emp_name = '".$_POST['name']."' ";
    $run = sqlsrv_query($conn,$sql);
    $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
    $data = array($row['department']);
    
    echo json_encode($data);
  }
?>
