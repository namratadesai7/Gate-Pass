<?php
    include('header.php');
    include('dbcon.php');
    $Sr=$_GET['edit'];

    $sql="SELECT * FROM Fcoupon where Sr='$Sr'";
    $run=sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit food coupon</title>
</head>
<body>
    <div>
        <h4>Edit Food Coupon</h4>
        <div class="divCss">
            <form action="create_db.php" method="post" enctype="multipart/form-data">
            <div>
                   <label style="width:20%;" for="empId">
                   <select name="ID" id="empId" class="form-control mb-3" placeholder="Enter Employee ID"required>
                       <option><?php echo $row['Emp_ID'] ?></option>
                        <?php
                            $sql1 = "SELECT * FROM Pass";
                            $run1 = sqlsrv_query($conn,$sql1);
                            while($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){
                        ?>
                        <option><?php echo $row1['emp_id'] ?></option>
                        <?php } ?>
                    </select>
                   <input type="hidden" name="Sr" value="<?php echo $row['Sr']?>">
                   </label>
                   <label style="width:20%;" for="ctype">
                    <select class="form-select" name="ctype" id="ctype" value="<?php echo $row['Coupon_Type']?>">
                    <option value="<?php echo $row['Coupon_Type'] ?>"><?php echo $row['Coupon_Type'] ?></option>
                    <option value="Normal">Normal</option>
                    <option value="Special">Special</option>
                    </select>
                   </label>
                   <label style="width:20%;" for="empName">
                    <input type="text" placeholder="Enter Name" value="<?php echo $row['Emp_Name'] ?>" name="Name" id="empName"  class="form-control" >
                   </label>
                   <label style="width:20%;" for="dept">
                    <input type="text" placeholder="Enter Department" value="<?php echo $row['Department'] ?>" name="dept"id="dept" class="form-control">
                   </label>
                   <label style="width:20%;" for="approver">
                    <input type="text" placeholder="Enter aprrover" name="approver" id="approver"class="form-control mt-2" value="<?php echo $row['Approved_Name']?>">
                   </label>
            </div>
            <div class="row mt-3">
                 <div class="col"></div>
                     <div class="col-auto">
                        <button type="submit" class="btn btn-success rounded-pill" name="update">Submit</button>
                        <a href="gatepass.php" class="btn btn-danger rounded-pill ms-1">Back</a>
                     </div>
                </div>
            </div>   
            </form>
        </div>
    </div >
</body>
</html>
<script>
    $('#fcoupon').addClass('active'); 
    $(document).on('change','#empId',function(){
    var empid = $(this).val();
    $.ajax({
        url:'create_db.php',
        type:'post',
        dataType:'json',
        data:{empid:empid},
        success:function(data){
            $('#empName').val(data[0]);
            $('#dept').val(data[1]);
        }
    });
});
</script>