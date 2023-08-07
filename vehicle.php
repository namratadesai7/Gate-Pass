<?php
include('dbcon.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle No.</title>
</head>
<body>
<div class="container-fluid p-0">
        <div class="row">
            <div class="col">
                <h3>Vehicle No</h3>
            </div>
            <div class="col-auto"> 
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary me-5" data-bs-toggle="modal" data-bs-target="#vehicleModel">Add</button>
            </div>
        </div>

    <div class="divCss mt-3">
        <table class="table table-bordered text-center mb-0 mt-5" id="memo1">
            <thead>
                <th>Month</th>
                <th>Date</th>
                <th>Vehicle No.</th>
                <th>Name</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Out Date</th>
            </thead>
            <tbody>
             <?php
              $sql= "SELECT Sr, Month, Date, Vehicle_No, Name, Intime,Convert(varchar(15), CAST(Out_time as Time),108) as Out_time,format(Out_date, 'dd-MM-yyyy') as Out_date FROM vehicle";
              $run=sqlsrv_query($conn,$sql);
              while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
             ?>
               <tr>
                <td><?php echo $row['Month'] ?></td>
                <td><?php echo $row['Date']->format('d-m-Y') ?></td>
                <td><?php echo $row['Vehicle_No'] ?></td>
                <td><?php echo $row['Name'] ?></td>
                <td><?php echo $row['Intime']->format('H:i') ?></td>
                <td><?php echo $row['Out_time'] ?></td>
                <td><?php echo $row['Out_date'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 my-1 editbtn" id="<?php echo $row['Sr']?>">Edit</button>
                    <a href="vhpdf.php?pdf=<?php echo $row['Sr']?>" class="btn btn-warning btn-sm rounded-pill px-3 my-1">Pdf</a>
                </td>
                </tr>
                <?php
              }
             ?>
            </tbody>
        </table>
    </div>
    </div>


  <!-- add Modal -->
  <div class="modal fade" id="vehicleModel" tabindex="-1" aria-labelledby="vehicleModel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add new vehicle details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
              <form action="veh_db.php" method="post" autocomplete="off" id="vehicleform">
                  <div>
                      <label style="width:100%;" for="mon">Month
                        <input type="month" placeholder="Enter Month" id="mon" name="mon" class="form-control" required>
                      </label>
                      <label style="width:100%;" class="mt-2" for="date">Date
                        <input type="date" placeholder="Enter Date" id="date" name="date" class="form-control" required>
                      </label>
                      <label style="width:100%;" class="mt-2" for="vehno">Vehicle No.
                        <input type="text" placeholder="Enter Vehicle No." id ="vehno" name="vehno" class="form-control" required>
                      </label>
                      <label style="width:100%;" class="mt-2" for="">Name
                        <input type="text" placeholder="Enter Name" id="name" name="name" class="form-control" required>
                      </label>
                      <label  style="width:100%;" class="mt-2" for="itime">In Time
                        <input type="time"placeholder="Enter In Time" id="itime" name="itime" class="form-control" required>   
                      </label>
                  </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="save" form="vehicleform">Save</button>
        </div>
      </div>
    </div>
  </div>

<!-- edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="veh_db.php" method="post" id="editForm">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="update" form="editForm">Save</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
      $('#veh').addClass('active');

        $(document).on('click','.editbtn',function(){
          var edit= $(this).attr('id');
          $.ajax({
            url:'editveh.php',
            type: 'post',
            data: {edit:edit},
            // dataType: 'json',
            success:function(data){
              $('#editForm').html(data);  
              $('#editModal').modal('show');
            }
          });
        });
</script>
<?php
include('footer.php');
?>