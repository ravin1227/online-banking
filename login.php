<?php
  require ('header.inc.php');

  if(isset($_SESSION["username"])){
    header("Location: {$hostname}/index.php");
  }
 
?>
        <div class="col-7 log_in_form">
            <div class="card">
                <div>
                    <h5>Login To Your Account</h5>
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="login-user">
                            <span>Username:</span>
                            <input name="login_username" class="login_username" type="text">
                        </div>
                        <div class="login__pwd">
                            <span>Password:</span>
                            <input name="login_pwd" class="login_pwd" type="password">
                        </div>
                        <div>
                            <input class="login_btn" type="submit" name="login" value='Login'/>
                        </div>
                    </form>

                    <?php 

                      if(isset($_POST['login'])){
                        $username=get_safe_value($con,$_POST['login_username']);
                        $email=get_safe_value($con,$_POST['login_username']);
                        $password=get_safe_value($con,$_POST['login_pwd']);

                      $result=mysqli_query($con,"SELECT username,email_id,customers_id,account_no FROM users WHERE username='{$username}' OR email_id='{$email}' AND password='{$password}'");

                      if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                          // session_start();
                          $_SESSION["username"]=$row['username'];
                          $_SESSION["email"]=$row['email_id'];
                          $_SESSION["customers_id"]=$row['customers_id'];
                          $_SESSION["account_no"]=$row['account_no'];
                          
                          header("Location: {$hostname}/home.php");
                          }
                        }else{
                          echo '<script>alert("Please Enter Correct Details");
                                        window.location.href="login.php";
                                 </script>';
                                 die();
                      }

                      }
                    ?>
                </div>
            </div>
        </div>
  <?php 
    require ('footer.inc.php');
  ?>