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
</head>
<body>
    <div class="container-fluid m-2">
       <form id="formdata">
        <div>
            <label class="w-25">Date
               <input type="date" name="date" class="form-control">
            </label>
            <label class="w-25">Visitor Name
               <input type="text" name="name" class="form-control">
            </label>
            <label class="w-25">Person to Meet
               <input type="text" name="Personto_Meet" class="form-control">
            </label>
            <button type="button" class="btn btn-primary ms-3" id="search">Search</button>
        </div>
       </form>
<div id="showData">

</div>
</div>
</body>
</html>
<script>
$('#Report').addClass('active');

$(document).on('click','#search', function(){
$.ajax({                                   //This is the jQuery AJAX method used to make an asynchronous HTTP request to the server.
    url:'report_get.php',
    type:'post',
    data:$('#formdata').serialize(),       //This line retrieves the form data from an HTML form with the ID "formdata" and 
                                           //serializes it into a URL-encoded string. This data will be sent to the server as part of the AJAX request.
    success:function(response){            //This is the success callback function that will be executed when the AJAX request is successful. 
                                           // The response parameter holds the data returned by the server.
    $('#showData').html(response);         //, it updates the content of the "showData" element with the data returned by the AJAX request, effectively displaying the response on the page.
    }
})
});
</script>
<?php
include('footer.php');
?>