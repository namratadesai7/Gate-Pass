<?php
include('dbcon.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {     /*   remove up down arrows for number type*/
                -webkit-appearance: none;
                margin: 0;
            }
        </style> 
    <title>Add Vehicle number</title>
</head>
<body>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container-fluid p-0 mt-2">
         <h4 style="text-align:center;" >Add new vehicle details</h4>
        <div class="divCss">
             <form action="veh_db.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div>
                    <label style="width:20%;" for="mon">Month
                     <input type="text" placeholder="Enter Month" id="mon" name="mon" class="form-control" required>
                     </label>
                    <label style="width:20%;" for="date">Date
                        <input type="date" placeholder="Enter Date" id="date" name="date" class="form-control" required>
                    </label>
                    <label style="width:20%;" for="vehno">Vehicle No.
                        <input type="text" placeholder="Enter Vehicle No." id ="vehno" name="vehno" class="form-control" required>
                    </label>
                    <label style="width:20%;" for="">Name
                    <input type="text" placeholder="Enter Name" id="name" name="name" class="form-control" required>
                    </label>
                    <label  style="width:20%;"for="itime">In Time
                     <input type="time"placeholder="Enter In Time" id="itime" name="itime" class="form-control" required>   
                    </label>
                <div>
                <div class="row">
                    <div class="col"></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success rounded-pill" name="save">Submit</button>
                            <a href="vehicle.php" class="btn btn-danger rounded-pill ms-1">Back</a>
                        </div>
                    </div>
                </div>
        </div>
    </form>
    </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script>
      $('#veh').addClass('active');
</script>
<?php
include('footer.php');
?>