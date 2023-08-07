<?php 
include('header.php'); 
include('dbcon.php'); 
$Sr= $_GET['edit'];

$sql="SELECT * FROM Table_1 where Sr='$Sr'";
$run=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="style.css"/>
      <style>
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {        /*   remove up down arrows for number type*/
                -webkit-appearance: none;
                margin: 0;
            }
        </style> 
</head>
<body class="p-2">
            <div class="container-fluid p-0 mt-2">
                <h4 style="text-align: center;">Edit Gate Pass</h4>
                <div class="divCss">
                    <form action="add_db.php" method="post" autocomplete="off" enctype="multipart/form-data"> 
                            <div>
                                    <label for ="img" style="width: 20%;">Image
                                    <input type="file" placeholder="Upload Image" name="img" class="form-control">
                                    <input type="hidden" name="Sr" value="<?php echo $row['Sr'] ?>">
                                    <input type="hidden" name="imageName" value="<?php echo $row['Image'] ?>">
                                    </label>
                               
                                    <label for ="date" style="width: 20%;">Date
                                    <input type="date" placeholder="Enter date" name="date" class="form-control" value= "<?php echo $row['Date']->format('Y-m-d') ?>" >
                                    </label> 
                               
                                    <label for="time" style="width: 20%;">Time
                                    <input type="time" placeholder="Enter in time" name="time" class="form-control" value="<?php echo $row['Intime']->format('H:i') ?>">
                                    </label>
                                                                
                                    <label for="num" style="width: 18%;">Mobile Number
                                    <input type="number" placeholder="Enter mobile number" name="num" class="form-control"  value="<?php echo $row['Mobile_No']?>">
                                    </label>
                                                                
                                    <label for="name" style="width: 20%;">Name
                                    <input type="text" placeholder="Enter Visitor's name" name="name"  class="form-control"  value="<?php echo $row['Visitor_Name']?>">
                                     </label>                               
                           </div>
                            <div class="mt-3">
                                
                                    <label for="det" style="width: 20%;">Details
                                    <input type="text" placeholder="Enter Visitor's details" name="det"  class="form-control"  value="<?php echo $row['Visitor_Details']?>">
                                    </label>
                                                               
                                    <label for="cname" style="width: 20%;">Company Name
                                    <input type="text" placeholder="Enter Company Name" name="cname"  class="form-control"  value="<?php echo $row['Company_Name']?>">
                                    </label>
                                                                  
                                    <label for="addr" style="width: 20%;">Address
                                    <input type="text" placeholder="Enter Address" name="addr" class="form-control"  value="<?php echo $row['Address']?>">
                                    </label>
                                                                    
                                    <label for="pname" style="width: 18%;">Person to meet
                                    <input type="text" placeholder="Enter Person to meet" name="pname" class="form-control"  value="<?php echo $row['Personto_Meet']?>">
                                    </label>
                                
                                    <label for="ofcname" style="width: 20%;">Time Officer name
                                    <input type="text" placeholder="Enter officer's name" name="ofcname"  class="form-control" value="<?php echo $row['Time_Officername']?>">
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
            </div>
</body>
</html>
<script>
    $('#gatepass').addClass('active');
</script>
<?php include('footer.php'); ?>