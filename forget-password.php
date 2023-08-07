<?php
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <h1>Forget Password</h1>
    <form action="send-password-reset.php" method="post" class="mt-3"  autocomplete="off" enctype="multipart/form-data">
        <label for="empid" class="form-label">EMP_ID
        <!-- <input type="text" class="form-control" name="userid" id="userid"> -->
        <select name="empid" id="empid" class="form-control mb-3" placeholder="Enter ID"required>
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
        <label for="email" class="form-label">Email
        <input type="text" class="form-control" name="email" id="email" ></label>
        <button>save</button>
    </form>
</body>
</html>
<script>
     $(document).on('change','#empid',function(){
    var empid = $(this).val();
    // console.log(name);

    $.ajax({
        url: 'fetchemail.php?empid='+empid,
        type: 'post',
        dataType: 'json',
        data: {empid:empid},
        
        success:function(data){
            $('#email').val(data[0]);  
            console.log(data);
        },
        error:function(res){
            console.log(res);
        }

    });

});
</script>