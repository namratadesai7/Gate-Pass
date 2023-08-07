<?php
session_start();
include('dbcon.php');
if(isset($_POST['login'])){

    $userid=$_POST['userid'];
    $pwd=$_POST['pwd']; 

    $sql="SELECT * FROM Pass where User_ID= '$userid'";
    $run= sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);

    if($pwd==$row['Password']){
        $_SESSION['Sr']= $row['Sr'];
        $_SESSION['name']=$row['User_ID'];
       
        ?>
            <script>
                // alert('User logged in');
                window.open('dashboard.php','_self');
            </script>
        <?php
    }else{
        ?>
        <script>
            alert('Password not match');
            window.open('index.php','_self');
        </script>
        <?php
    }
}


//add
if(isset($_POST['save'])){
    
    $date=$_POST['date'];
    $time=$_POST['time'];
    $num=$_POST['num'];
    $name=$_POST['name'];
    $det=$_POST['det']; 
    $cname=$_POST['cname'];
    $addr=$_POST['addr'];
    $pname=$_POST['pname'];
    $ofcname=$_POST['ofcname'];

    $img = $_FILES['img']['name'];
    $imgExt = substr($img, strripos($img, '.')); // get file extention
    $imgname = $name . $imgExt;
    move_uploaded_file($_FILES["img"]["tmp_name"], "image-upload/" .$imgname);

    $sql= "INSERT INTO table_1(Image,Date,Intime,Mobile_No,Visitor_Name,Visitor_Details,Company_Name,Address,Personto_Meet,Time_Officername) VALUES('$imgname','$date','$time','$num',' $name','$det','$cname','$addr',' $pname','$ofcname')";
    $run=sqlsrv_query($conn,$sql);

   if($run){
        ?>
        <script>
            // alert('saved successfully');
            window.open('gatepass.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }
}

//delete
if(isset($_GET['del'])){
    $Sr=$_GET['del'];

    $sql="UPDATE Table_1 SET Isdelete=1, UpdatedBy='$userid', UpdatedAt='$date' WHERE Sr='$Sr'";
    $run=sqlsrv_query($conn,$sql);

if($run){
    ?>
    <script>
        alert('Deleted Successfully');
        window.open('gatepass.php','_self');
    </script>
    <?php
    }else{
        print_r(sqlsrv_errors());
    }
}


//edit
if(isset($_POST['update'])){
    $imageName = $_POST['imageName']; 
    $Sr = $_POST['Sr']; 
    $date=$_POST['date'];
    $time=$_POST['time'];
    $num=$_POST['num'];
    $name=$_POST['name'];
    $det=$_POST['det']; 
    $cname=$_POST['cname'];
    $addr=$_POST['addr'];
    $pname=$_POST['pname'];
    $ofcname=$_POST['ofcname'];

    if($_FILES['img']['name'] != ''){
        $img = $_FILES['img']['name'];//name is keyboard
        $imgExt = substr($img, strripos($img, '.')); // get file extention
        $imgname = $name . $imgExt;
        move_uploaded_file($_FILES["img"]["tmp_name"], "image-upload/" .$imgname);
    }else{
        $imgname = $imageName;
    }

    $sql="UPDATE Table_1 SET Image='$imgname', Date='$date' ,Intime='$time' ,Mobile_No='$num', Visitor_Name='$name',Visitor_Details='$det',Company_Name ='$cname',Address='$addr',Personto_Meet='$pname',Time_Officername='$ofcname' WHERE Sr = '$Sr' ";
    $run=sqlsrv_query($conn,$sql);
    if($run){
        ?>
        <script>
            alert('updated Successfully');
            window.open('gatepass.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }
}
?>