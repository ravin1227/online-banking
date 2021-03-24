<?php 
 require('connection.inc.php');
 require('functions.inc.php');
 session_start();
 if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/index.php");
  }

 $accountNo=$accountName=$amount=$cpassword="";


 $accountNo=test_input($_POST['toAccountNo']);
 $accountName=test_input($_POST['toAccountName']);
 $amount=test_input($_POST['amountTo']);
 $cpassword=test_input($_POST['confirmPwd']);
 $cid=$_SESSION["customers_id"];

if(isset($_POST['money_transfer'])){
    $query=mysqli_query($con,"SELECT password FROM users WHERE customers_id='{$cid}'") or die(mysqli_error($con));
     if(mysqli_num_rows($query)>0){
         while($row=mysqli_fetch_assoc($query)){
             $password1=$row['password'];

            if($password1==$cpassword){

                $query3=mysqli_query($con,"SELECT balance FROM customer_balance WHERE customers_id='{$cid}'") or die(mysqli_error($con));
                if(mysqli_num_rows($query3)>0){
                    while($row3=mysqli_fetch_assoc($query3)){
                        $current_bal2=$row3['balance'];
                        $update_bal2=$current_bal2-$amount;
                        if($current_bal2>=$amount){
                        mysqli_query($con,"UPDATE customer_balance SET balance=$update_bal2 WHERE customers_id='{$cid}'") or die(mysqli_error($con));
                        }else{
                            echo '<script>alert("Insufficient amount in your account");
                                        window.location.href="money_transfer.php";
                                 </script>';
                                 die();
                        }
                    }
                }
                $query2=mysqli_query($con,"SELECT balance FROM `customer_balance` WHERE account_no='{$accountNo}'") or die(mysqli_error($con));
                     if(mysqli_num_rows($query2)>0){
                     while($row2=mysqli_fetch_assoc($query2)){
                        $current_balance=$row2['balance'];
                        $update_balance=$current_balance+$amount;
                            mysqli_query($con,"UPDATE customer_balance SET balance=$update_balance WHERE account_no='{$accountNo}'") or die(mysqli_error($con));
                        
                    }
                    }else{
                        echo '<script>alert("User Not Found");
                                        window.location.href="money_transfer.php";
                                </script>';
                        die();
                    }

                     $date=date("Y-m-d H:i:s");
                    $randomNum= substr(str_shuffle("0123456789"),0,7);
                    $transnum= "TRAN".$randomNum;
                    $query4=mysqli_query($con,"INSERT INTO `transaction` (customers_id,account_no,account_name,amount,date_time,trans_num) VALUES ('{$cid}','{$accountNo}','{$accountName}','{$amount}','{$date}','{$transnum}') ") OR DIE(mysqli_error($con));
                
                echo '<script>alert("Money Transfer Succesfull");
                                    window.location.href="money_transfer.php";
                            </script>';
                        
            }else{
                echo '<script>alert("Invalid Password");
                                    window.location.href="money_transfer.php";
                            </script>';
                
            }


         }
     }
}


?>