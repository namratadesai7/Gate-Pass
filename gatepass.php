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
        table.dataTable{
              border-collapse: collapse;  
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col">
                <h3>Gate Pass</h3>
            </div>
            <div class="col-auto">
                <a href="add_new.php" class= "btn btn-danger rounded-pill px-3">Add New</a>
                <!-- <a href="report.php" class= "btn btn-danger rounded-pill px-3">Report</a> -->
            </div>
        </div>
        <div class="divCss mt-3">
            <table class="table table-bordered text-center mb-0  table-striped  table-hover" id="visitors">
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
                    <th style="width:150px; text-align:center;" >Action</th>
                </thead>
                <tbody>
                <?php
                    //to display data on screen from DB
                    $sql="SELECT * FROM Table_1 WHERE Isdelete=0";
                    $run=sqlsrv_query($conn,$sql);
                    while($row=sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
                ?>
                <tr >
                    <td><img src="image-upload/<?php echo $row['Image']?>" width="60" height="55"> </td>
                    <td style="white-space:nowrap;"><?php echo $row['Date']->format('d-m-Y') ?></td>
                    <td><?php echo $row['Intime']->format('H:i') ?></td>
                    <td><?php echo $row['Mobile_No']?></td>
                    <td><?php echo $row['Visitor_Name']?></td>
                    <td><?php echo $row['Visitor_Details']?></td>
                    <td><?php echo $row['Company_Name']?></td>
                    <td><?php echo $row['Address']?></td>
                    <td><?php echo $row['Personto_Meet']?></td>
                    <td><?php echo $row['Time_Officername']?></td>
                    <td class="act">
                 
                        <button style=" font-size: 12px;" type="button" class="btn btn-primary btn-sm rounded-pill  btn-sm editBtn" id="<?php echo $row['Sr']?>">Edit</button>
                        <button type="button" style=" font-size: 12px;" class="btn btn-danger btn-sm rounded-pill  btn-sm delelteBtn" id="<?php echo $row['Sr']?>">Delete</button>
                        <a href="pdf.php?pdf=<?php echo $row['Sr']?>" style=" font-size: 12px;" class="btn btn-warning btn-sm rounded-pill">Pdf</a>

                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script>
   $('#gatepass').addClass('active');

    $(document).ready(function(){
		var table = $('#visitors').DataTable({   // initializes a DataTable using the DataTables library 
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

    $(document).on('click','.delelteBtn',function(){
        var del=  $(this).attr('id');
        if(confirm('Are You Sure!')){
            window.open('add_db.php?del='+del,'_self');
        }else{
            return false;
        }
    });

    $(document).on('click','.editBtn',function(){
        var edit=  $(this).attr('id');
        window.open('edit.php?edit='+edit,'_self');
    });
</script>
<?php include('footer.php'); ?>