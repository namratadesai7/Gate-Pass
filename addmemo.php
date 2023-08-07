<?php 
include('header.php'); 
include('dbcon.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add memo</title>
    <style>
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {     /*   remove up down arrows for number type*/
                -webkit-appearance: none;
                margin: 0;
            }
        </style> 
</head>
<body>
<div class="container-fluid p-0 mt-2">
        <h4 style="text-align: center;">Add New Memo</h4>
        <div class="divCss">
            <form action="memo_db.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="mt-1 mb-0">
                    <label style="width: 20%;" for="loc">Location
                        <input type="text" placeholder="Enter Location" id="loc" name="loc" class="form-control" required>
                    </label>
                    <label style="width: 20%;" for ="date">Date
                        <input type="date" placeholder="Enter date" id="date" name="date" class="form-control" required>
                    </label>
                
                <label style="width:20%;" for="name">Name
                    <select name="name" id="name" class="form-control mb-3" placeholder="Name"required>
                         <option></option>
                        <?php
                            $sql = "SELECT * FROM Pass";
                            $run = sqlsrv_query($conn,$sql);
                            while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
                        ?>
                        <option><?php echo $row['emp_name'] ?></option>
                        <?php } ?>
                    </select>
                   </label>
                    
                <label style="width: 20%;" for="dept">Department
                    <input type="text" placeholder="Enter Department" name="dept" id="dept" class="form-control" required>
                </label>
                </div>
                <table class="table table-bordered text-center mb-0 mt-5">
                <thead>
                    <tr>
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" placeholder="Enter Material" name="mat[]" class="form-control" required></td>
                        <td> <input type="number" placeholder="Enter Quantity" name="qty[]" class="form-control qty" required></td>
                        <td><input type="number" placeholder="Enter rate in Rs" name="rate[]" class="form-control rate" required></td>
                        <td><input type="number" placeholder="Enter Amount" name="amt[]" class="form-control amt" required readonly></td>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="Enter Material" name="mat[]" class="form-control" required></td>
                        <td> <input type="number" placeholder="Enter Quantity" name="qty[]" class="form-control qty" required></td>
                        <td><input type="number" placeholder="Enter rate in Rs" name="rate[]" class="form-control rate" required></td>
                        <td><input type="number" placeholder="Enter Amount" name="amt[]" class="form-control amt" required readonly></td>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="Enter Material" name="mat[]" class="form-control" required></td>
                        <td> <input type="number" placeholder="Enter Quantity" name="qty[]" class="form-control qty" required></td>
                        <td><input type="number" placeholder="Enter rate in Rs" name="rate[]" class="form-control rate" required></td>
                        <td><input type="number" placeholder="Enter Amount" name="amt[]" class="form-control amt" required readonly></td>
                    </tr>
                </tbody>
                </table>
                <div class="mt-3">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success rounded-pill" name="save" >Submit</button>
                            <a href="memo.php" class="btn btn-danger rounded-pill ms-1">Back</a>
                        </div>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</body>
</html>
<script>  
  $('#memo').addClass('active');

  $(document).on('change','#name',function(){
    var name = $(this).val();
    // console.log(name);

    $.ajax({
        url: 'memo_db.php?name='+name,
        type: 'post',
        dataType: 'json',
        data: {name:name},
        
        success:function(data){
            $('#dept').val(data[0]);  
            console.log(data);
        },
        error:function(res){
            console.log(res);
        }

    });

});

$(document).on("change",".qty,.rate",function(){
    var rate = $(this).closest('tr').find('.rate').val();
    var qty = $(this).closest('tr').find('.qty').val();
    $(this).closest('tr').find('.amt').val(rate*qty);
    
});
</script>
<?php
include('footer.php');
?>