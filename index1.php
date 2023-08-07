<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css"/>
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
                    <a href="" class="active"><i class="fa-solid fa-house"></i>
                    <span>Dashboard</span> </a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-address-book"></i>
                        <span>GatePass</span>
                    </a>
                </li>   
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

            <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" placeholder="search here"/>
            </div>

            <div class="user-wrapper">
                <img src="images/abcd.jpg" width="40px" height="30px" alt="">
                <div>
                    <h4>John Doe</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>       

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <div class="la la-users"></div>
                    </div>
                </div>    
        
                <div class="card-single">
                    <div>
                        <h1>79</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <div class="la la-clipboard"></div>
                    </div>
                </div> 
                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <div class="la la-users"></div>
                    </div>
                </div> 
                <div class="card-single">
                    <div>
                        <h1>6k</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <div class="la la-google-wallet"></div>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">   
                        <div class="card-header">
                            <h3>Recent Projects</h3>
                            <button>See all<span class="las la-arrow-right></span"></span></button>
                        </div>

                        <div class="card-body">
                            <table width="100%"> 
                                <thead>
                                    <tr>
                                        <td>Project Title</td>
                                        <td>Department </td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td>    
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web Development</td>
                                        <td>Frontend</td>
                                    
                                        <td>    
                                            <span class="status pink"></span>
                                            in progress
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushop app</td>
                                        <td>Mobile Team </td>
                                        <td>    
                                            <span class="status orange"></span>
                                            pending     
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                    
                                        <td>    
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web Development</td>
                                        <td>Frontend</td>
                                    
                                        <td>    
                                            <span class="status pink"></span>
                                            in progress
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushop app</td>
                                        <td>Mobile Team </td>
                                        <td>    
                                            <span class="status orange"></span>
                                            pending     
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushop app</td>
                                        <td>Mobile Team </td>
                                        <td>    
                                            <span class="status orange"></span>
                                            pending     
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card">    
                        <div class="card-header">
                            <h3>New Customer</h3>
                            <button>See all<span class="las la-arrow-right></span"></span></button>
                        </div>

                        <div class="card-body">
                            <div class="customer">
                                <img src="images/abcd.jpg" width="40px" height="40px" alt="">
                                <h4>Lewis S. Cunningham</h4>
                                <small>CEO Except</small>
                            </div>
                        </div>
                        <span class="las la-user-circle"></span>    
                        <span class="las la-comment"></span> 
                        <span class="las la-phone"></span> 
                    </div>
                </div>
            </div>  
       
        </main>
    </div>
    </div>
</body>
</html>