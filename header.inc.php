<?php
 require ('connection.inc.php');
 require ('functions.inc.php');
 session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta class="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <title>Bank Of College</title>
    <div class="alert alert-danger alert-dismissible ">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Warning!</strong> THIS SITE IS FOR EDUCATIONAL PURPOSE ONLY!
  </div>
</head>
<body>

<div class="container-fluid banner">
<!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>THIS SITE IS FOR EDUCATIONAL PURPOSE!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->

        <div class="row">
            <div class="banner_area">
                <h2>
                    Bank For You
                </h2>
            </div>
        </div>
        <div class="landing_btn">
                                <?php
                                    if(!isset($_SESSION['username'])){
                                    }
                                ?>
                                <?php
                                if(!isset($_SESSION['username'])){
                                    echo '<a href="index.php"><button type="button" class="btn">Home</button></a>';
                                    echo '<a href="new_account.php"><button type="button" class="btn">Open Account</button></a>';
                                    echo '<a href="login.php"><button type="button" class="btn">Login </button></a>';
                                }else{
                                    echo '<a href="logout.php"><button type="button" class="btn">Logout </button></a>';
                                }
                                ?>
                        </div>
</div>
<?php
    if(isset($_SESSION['username'])){
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="home.php">Home</a>
                  </li>
                  <li class="nav-item">
                                <a class="nav-link" href="profile.php">My Profile</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="balance.php">Balance</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="deposite.php">Deposit</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="transaction.php">Transaction</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="money_transfer.php">Transfer</a>
                                </li>
                                
            </ul>
        </div>
      </nav>
      ';
    }
    ?>
                          
<div class="container-fluid">
                         
    <div class="row">
        <?php 
            if(isset($_SESSION['username'])){
                echo '<div class="col-3 ">
                <div class="services_sidebar">
                    <h5>SERVICES</h5>
                    <hr/>
                    <ul>
                        <li>
                            <a href=""> Online Banking</a>
                        </li>
                        <hr/>
                        <li>
                            <a href="money_transfer.php">Money Transfer</a>
                        </li>
                        <hr/>
                        <li>
                            <a href="transaction.php">Transaction</a>
                        </li>
                        <hr/>
                        <li>
                            <a href="balance.php">Balance Inquery</a>
                        </li>
                        <hr/>
                    </ul>
                </div>
            </div>';
            }
        ?>