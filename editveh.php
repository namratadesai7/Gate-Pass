<?php
include('dbcon.php');
$Sr = $_POST['edit'];

$sql="SELECT Sr, Month, Date, Vehicle_No, Name, Intime,Convert(varchar(15), CAST(Out_time as Time),108) as Out_time,format(Out_date, 'yyyy-MM-dd') as Out_date FROM vehicle where Sr='$Sr'";
$run=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
<div>
    <label style="width:100%;" class="mt-2" for="mon">Month
        <input type="month" id="mon" name="mon" class="form-control" value="<?php echo $row['Month']?>">
        <input type="hidden" name="Sr" value="<?php echo $Sr ?>">
        </label>
    <label style="width:100%;" class="mt-2" for="date">Date
        <input type="date" id="date" name="date" class="form-control" value="<?php echo $row['Date']->format('Y-m-d') ?>">
    </label>
    <label style="width:100%;" class="mt-2" for="vehno">Vehicle No.
        <input type="text" id ="vehno" name="vehno" class="form-control" value="<?php echo $row['Vehicle_No']?>">
    </label>
    <label style="width:100%;" class="mt-2" for="name">Name
    <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['Name']?>">
    </label>
    <label  style="width:100%;" class="mt-2" for="itime">In Time
        <input type="time" id="itime" name="itime" class="form-control" value="<?php echo $row['Intime']->format('H:i') ?>">   
    </label>
    <label  style="width:100%;" class="mt-2" for="otime">Out Time
        <input type="time" id="otime" name="otime" class="form-control" value="<?php echo $row['Out_time'] ?>">   
    </label>
    <label  style="width:100%;" class="mt-2" for="odate">Out Date
        <input type="date" id="odate" name="odate" class="form-control"  value="<?php echo $row['Out_date'] ?>">   
    </label>
</div>   

<!-- 
// we can send data also by following way with the 1-help of variable 2-also we can use json -->
<!-- $output = '
<div>
    <label style="width:100%;" class="mt-2" for="mon">Month
        <input type="month" id="mon" name="mon" class="form-control" value="'.$row['Month'].'">
        <input type="hidden" name="Sr" value="'.$Sr.' ?>">
        </label>
    <label style="width:100%;" class="mt-2" for="date">Date
        <input type="date" id="date" name="date" class="form-control" value="'. $row['Date']->format('Y-m-d').'">
    </label>
    <label style="width:100%;" class="mt-2" for="vehno">Vehicle No.
        <input type="text" id ="vehno" name="vehno" class="form-control" value="'.$row['Vehicle_No'].'">
    </label>
    <label style="width:100%;" class="mt-2" for="name">Name
    <input type="text" id="name" name="name" class="form-control" value="'. $row['Name'].'">
    </label>
    
    <label  style="width:100%;" class="mt-2" for="itime">In Time
        <input type="time" id="itime" name="itime" class="form-control" value="'. $row['Intime']->format('H:i').'">   
    </label>
    <label  style="width:100%;" class="mt-2" for="otime">Out Time
        <input type="time" id="otime" name="otime" class="form-control" value="'.$row['Out_time'].'">   
    </label>
    <label  style="width:100%;" class="mt-2" for="odate">Out Date
        <input type="date" id="odate" name="odate" class="form-control"  value="'. $row['Out_date'].'">   
    </label>
</div>   
';
echo $output         //way 1
OR
echo json_encode($output);  //way 2 (for thie we have to write dataType=json in ajax)
?> -->
