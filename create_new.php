<?php
include('header.php');
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
</head>
<body>
    <div class="container-fluid p-0 mt-2">
        <h4 style="text-align:center">Create New Food Coupon</h4>
        <div class="divCss">
            <form action="create_db.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div>
                   <label style="width:20%;" for="empId">Employee ID
                    <select name="ID" id="empId" class="form-control mb-3" placeholder="Enter Employee ID"required>
                        <option></option>
                        <?php
                            $sql = "SELECT * FROM Pass";
                            $run = sqlsrv_query($conn,$sql);
                            while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
                        ?>
                        <option><?php echo $row['emp_id'] ?></option>
                        <?php } ?>
                    </select>
                   </label>
                   <label style="width:20%;" for="ctype">Coupon Type
                    <select class="form-select" name="ctype" id="ctype">
                     <option value="Normal">Normal</option>
                     <option value="Special">Special</option>
                    </select>
                   </label>
                   <label style="width:20%;" for="empName">Name
                    <input type="text" placeholder="Enter Name" name="Name" id="empName" class="form-control" required>
                   </label>
                   <label style="width:20%;" for="dept">Department 
                    <input type="text" placeholder="Enter Department" name="dept" id="dept" class="form-control" required>
                   </label>
                   <label style="width:20%;" for="approver">Aprrover name
                    <input type="text" placeholder="Enter aprrover" name="approver" class="form-control" required>
                   </label>
                </div>
                <div class="mt-3">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button class="btn btn-success rounded-pill" name="save">Submit</button>
                            <a href="fcoupon.php"class=" btn btn-danger rounded-pill ms-1">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script>
$('#fcoupon').addClass('active');

$(document).on('change','#empId',function(){
    var empid = $(this).val();
    $.ajax({
        url: 'create_db.php',
        type: 'post',
        dataType: 'json',
        data: {empid:empid},
        
        success:function(data){
           
            $('#empName').val(data[0]);
            $('#dept').val(data[1]);
        }
    });
});
</script>