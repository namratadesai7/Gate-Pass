<?php
include('dbcon.php');
include('header.php');
$Sr = $_GET['edit'];

$sql="SELECT * FROM Memohead where Sr = '$Sr'";
$run=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h4 style="text-align: center;">Edit Memo</h4>
        <div class="divCss">
            <form action="memo_db.php" method="post" id="editForm" autocomplete="off" enctype="multipart/form-data">
                <div class="mt-1 mb-0">
                    <label style="width: 20%;" for="loc">Location
                        <input type="text" placeholder="Enter Location" id="loc" name="loc" class="form-control" value="<?php echo $row['Location']?>">
                        <input type="hidden" name="headSr" value="<?php echo $Sr ?>">
                    </label>
                    <label style="width: 20%;" for ="date">Date
                        <input type="date" placeholder="Enter date" id="date" name="date" class="form-control"  value="<?php echo $row['Date']->format('Y-m-d') ?>">
                    </label>
                
                <label style="width:20%;" for="name">Name
                    <select name="name" id="name" class="form-control mb-3" placeholder="Name">
                        <option></option>
                        <?php
                            $sqla = "SELECT * FROM Pass";
                            $runa = sqlsrv_query($conn,$sqla);
                            while($rowa = sqlsrv_fetch_array($runa, SQLSRV_FETCH_ASSOC)){
                        ?>
                        <option <?php if($row['Name'] ==  $rowa['emp_name']){
                            ?> selected <?php } ?>><?php echo $rowa['emp_name'] ?></option>
                        <?php } ?>
                    </select>
                   </label>
                    
                    <label style="width: 20%;" for="dept">Department
                        <input type="text" placeholder="Enter Department" name="dept" id="dept" class="form-control" value="<?php echo $row['Department']?>">
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
                    <?php 
                        $sql1="SELECT * FROM memodetail where head_id = '$Sr'";
                        $run1=sqlsrv_query($conn,$sql1);
                        while($row1=sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Material" name="mat[]" class="form-control" value="<?php echo $row1['Material'] ?>">
                            <input type="hidden" name="detailSr[]" value="<?php echo $row1['Sr'] ?>">
                        </td>
                        <td><input type="number" placeholder="Enter Quantity" name="qty[]" class="form-control qty" value="<?php echo $row1['Quantity'] ?>" ></td>
                        <td><input type="number" placeholder="Enter rate in Rs" name="rate[]" class="form-control rate" value="<?php echo $row1['Rate'] ?>" ></td>
                        <td><input type="number" placeholder="Enter Amount" name="amt[]" class="form-control amt" value="<?php echo $row1['Amount'] ?>"readonly ></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                <div class="mt-3">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success rounded-pill" name="update" form="editForm">Submit</button>
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

      $(document).on("change",".qty,.rate",function(){
        var rate = $(this).closest('tr').find('.rate').val();
        var qty = $(this).closest('tr').find('.qty').val();
        $(this).closest('tr').freind('.amt').val(rate*qty);
      });
</script>
<?php
include('footer.php');
?>
