<?php 
include('header.php'); 
include('dbcon.php'); 
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
        <h4 style="text-align: center;">Add New Gate Pass</h4>
        <div class="divCss">
            <form action="add_db.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div>
                    <label style="width: 20%;" for ="img">Image
                        <input type="file" placeholder="Upload Image" name="img" class="form-control" required>
                    </label>
                    <label style="width: 20%;" for ="date">Date
                        <input type="date" placeholder="Enter date" name="date" class="form-control" required>
                    </label>
                    <label style="width: 18%;" for="time">Time
                        <input type="time" placeholder="Enter in time" name="time" class="form-control" required>
                    </label>
                    <label style="width: 20%;" for="num">Mobile Number
                        <input type="number" placeholder="Enter mobile number" name="num" class="form-control" required>
                    </label>
                    <label style="width: 20%;" for="name">Name
                        <input type="text" placeholder="Enter Visitor's name" name="name" class="form-control" required>
                    </label>
                </div>
                <div class="mt-3">
                    <label style="width: 20%;" for="det">Details
                        <input type="text" placeholder="Enter Visitor's details" name="det" class="form-control" required>
                    </label>
                    <label style="width: 20%;" for="cname">Company Name
                        <input type="text" placeholder="Enter Company Name" name="cname" class="form-control" required>
                    </label>
                    <label style="width: 20%;" for="addr">Address
                        <input type="text" placeholder="Enter Address" name="addr" class="form-control" required>
                    </label>
                    <label style="width: 20%;" for="pname">Person to meet
                        <input type="text" placeholder="Enter Person to meet" name="pname" class="form-control" required>
                    </label>
                    <label style="width: 18%;" for="ofcname">Time Officer name
                        <input type="text" placeholder="Enter officer's name" name="ofcname" class="form-control" required>
                    </label>
                </div>  
                <div class="mt-3">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success rounded-pill" name="save">Submit</button>
                            <a href="gatepass.php" class="btn btn-danger rounded-pill ms-1">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script>
    $('#gatepass').addClass('active');
</script>
<?php include('footer.php'); ?>