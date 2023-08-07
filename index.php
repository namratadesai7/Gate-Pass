<?php
session_start();
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
<?php
    if(isset($_SESSION['name'])){
        header('location:dashboard.php');
    }
    ?>
<div class="hero">
    <div class="form-box">
        <form  action="add_db.php" method="post" id="login" class="input-group">
            <img src="suyoglogo.png" alt="Girl in a jacket" width="80" height="70" class="image"> 
            <div class="reel">
            <input type="text" placeholder="User Id" class="input-field" name="userid" require>
            <input type="password" placeholder="Enter password" class="input-field" name="pwd" require> 
            </div>
            <div class="forget">
               <a href="forget-password.php" style="font-weight:20; height:40px; text-decoration:none;">Forget password?</a>
            </div>
                 <button type="submit" class="btn btn-success btn-bg rounded-pill px-3 btn" name="login" form="login"  >Submit</button>
            
        </form>
        
    </div>
</div>
    
</body>
</html>