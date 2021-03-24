<?php 
    require ('header.inc.php');
    $cid=$_SESSION["customers_id"];
    if(!isset($_SESSION["username"])){
        header("Location: {$hostname}/index.php");
      }

?>
        <div class="col ">
            <div class="row last_transaction">
                <div class="card">
                    <h5>Last Transaction</h6>
                    <hr/>
                    <span>To</span>
                    <?php 
                        $query2=mysqli_query($con,"SELECT * FROM transaction WHERE customers_id='{$cid}' ORDER BY id DESC LIMIT 1") OR DIE(mysqli_error($con));
                        if(mysqli_num_rows($query2)>0){
                            while($row2=mysqli_fetch_assoc($query2)){
                    ?>
                    <div class="last_t_to">
                        <input type="text" value="<?php echo $row2['account_no'] ?>" readonly>
                        <input type="text" value="<?php echo $row2['account_name'] ?>" readonly>
                    </div>
                    <div class="last_t_amount">
                        <input type="text" value="&#8377;<?php echo $row2['amount'] ?>" readonly>
                    </div>
                    <div class="last_t_date">
                        <span>Date and Time</span>
                        <input type="text" name="" value="<?php echo $row2['date_time'] ?>" readonly>
                    </div>
                            <?php }
                            }
                            ?>
                </div>
            </div>
            <div class="row all_trans">
                    <div class="card">
                        <div><h5>All Transaction <hr></h5></div>
                        <table>
                                <tr>
                                    <th>Transaction Number <hr></th>
                                    <th>Account Number <hr></th>
                                    <th>Account Name <hr></th>
                                    <th>Amount<hr></th>
                                    <th>Date and Time<hr></th>
                                    <th>Transaction Type<hr></th>
                                </tr>
                                <?php 
                                    $query=mysqli_query($con,"SELECT * FROM transaction WHERE customers_id='{$cid}' ORDER BY id DESC") OR DIE(mysqli_error($con));
                                    if(mysqli_num_rows($query)>0){
                                        while($row=mysqli_fetch_assoc($query)){
                                ?>
                                <tr>
                                    <th><input type="text" value="<?php echo $row['trans_num'];?>" readonly></th>
                                    <th><input type="text" value="<?php echo $row['account_no'];?>" readonly></th>
                                    <th><input type="text" value="<?php echo $row['account_name'];?>" readonly></th>
                                    <th><input type="text" value="&#8377;<?php echo $row['amount'];?>" readonly></th>
                                    <th><input type="text" value="<?php echo $row['date_time'];?>" readonly></th>
                                    <th><input type="text" value="<?php if($row['trans_type']==0) echo "Debited"; else echo "Credited";?>" readonly></th>
                                </tr>
                                <?php 
                                        }
                                    }
                                ?>
                        </table>
                    </div>
            </div>
        </div>
 <?php 
require ('footer.inc.php');
 
 ?>