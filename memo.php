<?php
include('dbcon.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memo</title>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col">
                <h3>Food Coupon</h3>
            </div>
            <div class="col-auto">
                <a href="addmemo.php" class="btn btn-danger rounded-pill me-5">Add</a>
            </div>
        </div>
    <div class="divCss mt-3">
        <table class="table table-bordered text-center mb-0 mt-5" id="memo1">
            <thead>
                <th>Location</th>
                <th>Date</th>
                <th>Name</th>
                <th>Department</th>
                <th>Material</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Amount</th>
                <th>Actions</th>
            </thead>
            <tbody>
             <?php
              $sql= "SELECT * FROM Memohead a left outer join memodetail b on a.Sr = b.head_id";
              $run=sqlsrv_query($conn,$sql);
              while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
             ?>
               <tr>
                <td><?php echo $row['Location'] ?></td>
                <td><?php echo $row['Date']->format('d-m-Y') ?></td>
                <td><?php echo $row['Name'] ?></td>
                <td><?php echo $row['Department'] ?></td>
                <td><?php echo $row['Material'] ?></td>
                <td><?php echo $row['Quantity'] ?></td>
                <td><?php echo $row['Rate'] ?></td>
                <td><?php echo $row['Amount'] ?></td>
              
                <td>
                    <a href="editmemo.php?edit=<?php echo $row['head_id']?>" class="btn btn-primary btn-sm rounded-pill px-3 my-1">Edit</a>
                    <a href="memopdf.php?pdf=<?php echo $row['Sr']?>" class="btn btn-warning btn-sm rounded-pill px-3 my-1">Pdf</a>
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

    $('#memo').addClass('active');


    $(document).ready(function(){
		var table = $('#memo1').DataTable({   // initializes a DataTable using the DataTables library 
		    "processing": true,                  //This option enables the processing indicator to be shown while the table is being processed
			 dom: 'Bfrtip',                      // This option specifies the layout of the table's user interface B-buttons,f-flitering input control,T-table,I-informationsummary,P-pagination
			 ordering: false,                   //sort the columns by clicking on the header cells if true
			 destroy: true,                     //This option indicates that if this DataTable instance is re-initialized, 
                                                //the previous instance should be destroyed. This is useful when you need to re-create the table dynamically.
            
		 	lengthMenu: [
            	[ 5, 25, 50, -1 ],
            	[ '5 rows', '25 rows', '50 rows','Show all' ]
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