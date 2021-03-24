<?php 
  require ('header.inc.php');
  if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/index.php");
  }
  $cid=$_SESSION["customers_id"];
?>
        <div class="col-6 balnce_check">
            <div class="card">
                    <h5> Current Balance</h5>
                    <hr/>
                    <?php 
                      $query= mysqli_query($con,"SELECT balance FROM `customer_balance` WHERE customers_id='{$cid}'") or die(mysqli_error($con));
                      if(mysqli_num_rows($query)>0){
                        while($row=mysqli_fetch_assoc($query)){
                    ?>
                    <div class="bcheck">
                        <?php
                         $query1= mysqli_query($con,"SELECT first_name,last_name FROM `users` WHERE  customers_id='{$cid}'");
                         if(mysqli_num_rows($query1)>0){
                          while($row1=mysqli_fetch_assoc($query1)){
                        ?>
                        <Span>Hey, <?php echo $row1['first_name']?> Your current balance is</Span>
                         <?php }
                         } ?>
                        <div>
                        <input type="text" value="&#8377; <?php echo $row['balance'] ?>" readonly> 
                        </div>
                    </div>
                    <?php
                       }
                      }
                    ?>
                    <div class="bcheck_button">
                        <a href="balance.php"><button>Refresh Balance</button></a>
                        <a href="home.php"><button>Back Home</button></a>
                    </div>
            </div>
        </div>
    <?php 
      require ('footer.inc.php')
    ?>