<?php
    require('header.inc.php');
    $cid=$_SESSION['customers_id'];
    if(!isset($_SESSION["username"])){
        header("Location: {$hostname}/index.php");
      }
?>
        <div class="col-6 deposite_money">
            <div class="row">
                <div class="card">
                    <h5>Deposite Money</h5>
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method='post'>
                        <div class="card_deposite_amount">
                            <span>Deposite Amount</span>
                            <input type="text" name="add_amount" placeholder="&#8377; Amount" required>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-6 card_design">
                                <div class="card">
                                    <div><span>Bank For You</span></div>
                                        <div class="card_cardno">
                                            <input type="text" placeholder="1235-1359-3584-7849" >
                                        </div>
                                        <div class="card_valid_upto">
                                            <span>Valid Upto</span>
                                            <input type="text" placeholder="12/10" >
                                        </div>
                                        <div class="card_card_holdern">
                                            <input type="text" placeholder="Card Holder Name" >
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="card_deposite_btn">
                            <!-- <button type="submit" name="submit">Go</button> -->
                            <input type="submit" name="submit" value="GO">
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                            $added_amount=get_safe_value($con,$_POST['add_amount']);
                            $query=mysqli_query($con,"SELECT balance FROM customer_balance WHERE customers_id ='{$cid}'") OR DIE(mysqli_error($con));
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_assoc($query)){
                                    $current_bal=$row['balance'];
                                    $updated_bal=$current_bal+$added_amount;
                                    
                                    $query2=mysqli_query($con,"UPDATE customer_balance SET balance ='{$updated_bal}' WHERE customers_id='{$cid}'") OR DIE(mysqli_error($con));


                                    $date=date("Y-m-d H:i:s");
                                    $randomNum= substr(str_shuffle("0123456789"),0,7);
                                    $transnum= "TRAN".$randomNum;
                                    $trans_type= "1";
                                    $query3=mysqli_query($con,"INSERT INTO transaction (customers_id,account_no,account_name,amount,date_time,trans_num,trans_type)
                                            VALUES ('{$cid}','CARD SELF','SELF','{$added_amount}','{$date}','{$transnum}','{$trans_type}')") OR DIE(mysqli_error($con));

                                    echo '<script>alert("Money Added To Your Account Succesfull");
                                                window.location.href="deposite.php";
                                            </script>';
                                    

                                }
                                }
                                else{
                                    echo '<script>alert("Unsuccessful");
                                    window.location.href="deposite.php";
                                    </script>';
                                }
                        }
                    ?>
                </div>
            </div>
        </div>
 <?php
    require ('footer.inc.php');
 ?>