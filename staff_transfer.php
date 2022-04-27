<?php

session_start();

if (!isset($_SESSION['staff_id'])) {
    include 'includes/403.php';
    exit();
}
$staff_id = $_SESSION["staff_id"];

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php include 'includes/shapes.php'; ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="staff_page.php">Haight Banking</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
                <div class="input-group">
                    <!--<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />-->
                    <!--<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>-->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <!--<a href="logout.php" class="btn btn-secondary mx-2" id="sign-out-btn">Sign out</a>-->
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="staff_page.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Customer Service</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Edit Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Add a new account</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Deposit</a>
                                    <a class="nav-link" href="staff_transfer.php">Transfer</a>
                                </nav>
                            </div>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Staff screens</div>
                            <a class="nav-link" href="add_log_manual.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Add Log Records
                            </a>
                            
                            <a class="nav-link" href="view_logs.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                View Audit Log 
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid px-4">
                    <!--- Database for Account Details --->

                        <h1 class="mt-4">Staff Transfer</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="staff_page.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Please use this screen to transfer funds between the provided customer accounts. 
                                <!--<a target="_blank" href="https://datatables.net/">official DataTables documentation</a>-->
                            </div>
                        </div>
                        <div class = "card mb-4">
                            <div "card-body">
                        <form method='post' style="text-align: center; ">
                            <label>Enter user ID: </label>
                            <input type="text" id="User" name="User"><br>
                        </form>
                        </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Users DataTable
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>userID</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                <?php
                $user_id = $_POST['User'];
                if(isset($user_id)){
                    
                   echo '<div class = "card mb-4">
                            <div "card-body">
                        <form method="post" style="text-align: center; " action= "staff_transfer_script.php">
                        <label class="col-sm-5 col-form-label fw-bold" style="font-size: 16px" for="first">First User Account</label>
                        <div class="col-sm-7">
                        <input class="form-control" name = "first" type="int" maxlength="20" required placeholder="Enter first ID">
                        
                        <label class="col-sm-5 col-form-label fw-bold" style="font-size: 16px" for="second">Second User Account</label>
                        <div class="col-sm-7">
                        <input class="form-control" name = "second" type="int" maxlength="20" required placeholder="Enter second ID">
                        
                        <label class="col-sm-5 col-form-label fw-bold" style="font-size: 16px" for="transfer">Amount</label>
                        <div class="col-sm-7">
                        <input class="form-control" name = "transfer" type="double" maxlength="20" required placeholder="Enter an amount to transfer">
                                            <div class="row mb-2 mt-2 mx-auto" style="width: 263px;">
                        <button class="btn btn-primary" style="" type="submit">Submit</button>
                    </div>
                        </form>
                        </div>
                        </div>';
                
                include 'scripts/db.php';
                $db = get_database_connection();
                // echo "Connected successfully";
                
                // $stmt = $db->prepare("SELECT * FROM accounts ORDER BY account_id");
                  $stmt = $db->prepare("SELECT * FROM users LEFT JOIN accounts ON users.user_id = accounts.user_id WHERE users.user_id = ?");
                //   echo "$users[firstname]";
                  $stmt->execute(array($user_id));
                  $num_results = $stmt->rowCount();
                  
                  
                  for ($i=0; $i <$num_results; $i++) {
                         
                         $user_id = $user[user_id];
                         $user = $stmt->fetch();
                	    
                	    echo "<tr>
                                            <td>$user[user_id]</td> 
                                            <td>$user[first_name] $user[last_name]</td>
                                            <td>$user[username]</td>
                                            <td>$user[email_address]</td>
                                            <td>$user[phone_number]</td>
                                            <td>$user[balance]</td>
                                            
                                            ";
                                            
                                            if($user['approved']==0){
                                                
                                            }
                                        "</tr>";
                                        
                                            
                        
                        // $stmt = $db->prepare("SELECT * FROM accounts where user_id = ?");
                	    
                	   // echo "<br>";
  }   
// echo "";
                }
                ?>
                
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </main>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        

 
    </body>
</html>
