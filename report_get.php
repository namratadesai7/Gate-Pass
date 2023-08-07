<?php
include('dbcon.php');
// include('header.php');
if(isset($_POST['date'])){
$date= $_POST['date'];
$name= $_POST['name'];
$personToMeet=$_POST['Personto_Meet'];
$condition="";

if(!empty($date)){
    $condition.=" AND Date= '$date'";
}
if(!empty($name)){
    $condition.=" AND Visitor_Name= '$date'";
}
if(!empty($personToMeet)){
    $condition.=" AND Personto_Meet = '$personToMeet'";
}
?>
<table class="table table-bordered text-center mt-3" id="visitors">
    <thead>
        <th>Image</th>
        <th>Date</th>
        <th>Intime</th>
        <th>Mobile No.</th>
        <th>Name</th>
         <th>Details</th>
         <th>Company Name</th>
         <th>Address</th>
         <th>Person to meet</th>
         <th>Time officer name</th>
    </thead>
    <tbody>
<?php

//to display data on screen from DB
$sql="SELECT * FROM Table_1 where Sr > 0".$condition;
$run=sqlsrv_query($conn,$sql);
while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
    ?>
<tr>
    <td><img src="image-upload/<?php echo $row['Image']?>" width="60" height="55"> </td>
    <td><?php echo $row['Date']->format('d-m-Y') ?></td>
    <td><?php echo $row['Intime']->format('H:i') ?></td>
    <td><?php echo $row['Mobile_No']?></td>
    <td><?php echo $row['Visitor_Name']?></td>
    <td><?php echo $row['Visitor_Details']?></td>
    <td><?php echo $row['Company_Name']?></td>
    <td><?php echo $row['Address']?></td>
    <td><?php echo $row['Personto_Meet']?></td>
    <td><?php echo $row['Time_Officername']?></td>
</tr>
<?php } ?>
    </tbody>
</table>
<?php
}

?>

<?php
include('footer.php');
?>