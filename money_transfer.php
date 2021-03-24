<?php 
  require ('header.inc.php');

  if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/index.php");
  }
 
  $cid=$_SESSION["customers_id"];


?>
        <div class="col-5 money_transfer">
            <div class="card">
            <?php 
                    $query1= mysqli_query($con,"SELECT account_no FROM `users` WHERE  customers_id='{$cid}'");
                    if(mysqli_num_rows($query1)>0){
                     while($row1=mysqli_fetch_assoc($query1)){
                   ?>
               <div class="t_from">
                   <h5>Transfer Money</h5>
                   <hr/>
                   <span>From</span>
                   <input type="text" placeholder=" <?php echo $row1['account_no']?>" readonly>
               </div>
               <?php 
                     }
                    }
               ?>
               <hr>
               <form action="money_transfer_cmd.php" method="post">
                   <div class="t_from">
                     <span>To</span>
                    </div>
                   <div class="t_account_num">
                       <span>Account No</span>
                       <input type="text" name="toAccountNo" placeholder="Receiver's Account no">
                   </div>
                   <div class="t_account_name">
                     <span>Account Name</span>
                    <input type="text" name="toAccountName" placeholder="Account Holder's Name">
                   </div>
                   <div class="t_amount">
                     <span>Amount</span>
                    <input type="text" name="amountTo" placeholder="&#8377; Sending Amount">
                   </div>
                   <div class="t_pwd">
                       <span>Confirm Password</span>
                       <input type="password" name="confirmPwd" placeholder="Confirm Password">
                   </div>
                  
                   <div class="t_submit">
                       <button type="submit" name="money_transfer">Tranfer Money</button>
                   </div>
               </form>
            </div>
        </div>
   <?php 
    require ('footer.inc.php');
   ?>