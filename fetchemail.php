<?php
include('dbcon.php');
if(true){
    $sql = "SELECT * FROM Pass where emp_id = '".$_POST['empid']."' ";
    $run = sqlsrv_query($conn,$sql);
    $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
    $data = array($row['email_id']);
    
    echo json_encode($data);
  }
  ?>