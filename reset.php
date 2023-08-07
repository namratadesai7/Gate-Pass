<?php 
$token = $_GET['token'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="hero">
    <div class="form-box">
        <form  action="forget_db.php" method="post" class="input-group">
            <img src="suyoglogo.png" alt="Girl in a jacket" width="80" height="70" class="image"> 
            <div class="reel">
            <input type="text" placeholder="New Password" class="input-field" name="npwd" require>
            <input type="hidden" name="token" require value="<?php echo $token ?>">
            <input type="text" placeholder="Confirm Password" class="input-field" name="cpwd" require> 
            </div>
                 <button type="submit" class="btn btn-success btn-bg rounded-pill px-3 mt-3 btn" name="forget">Submit</button>
            
        </form>
        
    </div>
</div>
</body>
</html>