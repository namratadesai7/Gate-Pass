<?php 
include('header.php');
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodcoupon</title>
    <style>
        table.dataTable{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col">
                <h3>Food Coupon</h3>
            </div>
            <div class="col-auto">
                <a href="create_new.php" class="btn btn-danger rounded-pill px-3">Create New</a>
            </div>
        </div>
        <div class="divCss mt-3">
            <table class="table table-bordered text-center " id="eaters">
                <thead>
                    <th>Emp ID</th>
                    <th>Coupon Type</th>
                    <th>Emp Name</th>
                    <th>Department</th>
                    <th>Approved Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                 <?php
                 $sql="SELECT * FROM Fcoupon";
                 $run=sqlsrv_query($conn,$sql);
                 while($row=sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
                    ?>     
                 <tr>
                    <td><?php echo $row['Emp_ID'] ?></td>
                    <td><?php echo $row['Coupon_Type'] ?></td>
                    <td><?php echo $row['Emp_Name'] ?></td>
                    <td><?php echo $row['Department'] ?></td>
                    <td><?php echo $row['Approved_Name'] ?></td>
                    <td  class="act">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 my-1 editbtn" id="<?php echo $row['Sr']?>">Edit</button>
                        <a href="couprint.php?pdf=<?php echo $row['Sr']?>" class="btn btn-warning btn-sm rounded-pill px-3 my-1">Print</a>
                    </td>
                 </tr>
                <?php
                }
                ?>
                </tbody>
            </table> 
        </div>
    </div>
</body>
</html>
<script>
$('#fcoupon').addClass('active');

$(document).on('click','.editbtn',function(){
    var edit= $(this).attr('id');
    window.open('editfcoupon.php?edit='+edit,'_self');
});
$(document).ready(function(){
		var table = $('#eaters').DataTable({     //initializes a DataTable using the DataTables library 
		    "processing": true,                  //This option enables the processing indicator to be shown while the table is being processed
			 dom: 'Bfrtip',                      // This option specifies the layout of the table's user interface B-buttons,f-flitering input control,T-table,I-informationsummary,P-pagination
			 ordering: false,                    //sort the columns by clicking on the header cells if true
			 destroy: true,                      //This option indicates that if this DataTable instance is re-initialized, 
                                                 //the previous instance should be destroyed. This is useful when you need to re-create the table dynamically.
            
		 	lengthMenu: [
            	[ 10, 25, 50, -1 ],
            	[ '10 rows', '25 rows', '50 rows','Show all' ]
        	],
			 buttons: [
		 		'pageLength','copy', 'excel'
        	]
    	});
 	});

</script>
<?php
include('footer.php');
?>