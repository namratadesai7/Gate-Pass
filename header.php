<?php
 session_start();
    if(!isset($_SESSION['name'])){
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css"/>


<!-- 
      show 5 row,copy,excel and search  -->

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!----------------------- jQuery UI --------------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.4.0/css/autoFill.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
</head>
<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h3><i class="fa-solid fa-earth-americas"></i><span>SEPL</span></h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard.php" id="dashboard"><i class="fa-solid fa-house"></i>
                    <span>Dashboard</span> </a>
                </li>
                <li>
                    <a href="gatepass.php" id="gatepass"><i class="fa-solid fa-address-book"></i>
                        <span>GatePass</span>
                    </a>
                </li>  
                <li>
                    <a href="report.php" id="Report"><i class="fa-regular fa-file me-3"></i>
                        <span>Report</span>
                    </a>
                </li>  
                <li>
                    <a href="fcoupon.php" id="fcoupon"><i class="fas fa-bread-slice me-3"></i>
                        <span>Food Coupon</span>
                    </a>
                </li> 
                <li>
                    <a href="memo.php" id="memo"><i class="fa-solid fa-receipt"></i>
                        <span>Memo</span>
                    </a>
                </li> 
                <li>
                    <a href="vehicle.php"  id="veh"><i class="fa-solid fa-truck"></i>
                        <span>Vehicle</span>
                    </a>
                </li> 
                <div >
                <li >
                    <a href="logout.php" ><i class="fa fa-sign-out me-3" ></i>
                        <span>Logout</span>
                    </a>
                </li>
                </div>
            </ul>
        </div>
    </div>

               
    <div class="main-content">
        <header>
            <div class="header-title">
                <label for="nav-toggle">
                    <i class="fa-solid fa-bars"></i> 
                </label> 
                <span>Dashboard</sapn> 
            </div>

            <!-- <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input  type="search" placeholder="search here"/>
            </div> -->

            <div class="user-wrapper">
                <img src="images/abcd.jpg" width="40px" height="30px" alt="">
                <div>
                    <h4> <?php echo $_SESSION['name']?></h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>       

 <main>