<?php 
  require ('header.inc.php');
  $cid=$_SESSION["customers_id"];
  if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/index.php");
  }


?>
        <div class="col-9">
            <div>
                <h5>My Profile</h5>
            </div>
            <hr/>
            <div class="row">
                <div class="col-3">
                    <div class="my_profile">
                    <?php 
                      $query=mysqli_query($con,"SELECT * FROM users WHERE customers_id='{$cid}'") or die(mysqli_error($con));
                      if(mysqli_num_rows($query)>0){
                        while($row=mysqli_fetch_assoc($query)){
                          $current_password=$row['password'];
                    ?>
                        <div class="myprofile_main">
                            <img class="myprofile_mainImg" src="upload/<?php echo $row['image'] ?>" alt="">
                            <button type="button" class="btn profileImg" data-toggle="modal" data-target="#exampleModalimg" data-whatever="@mdo">Edit Profile</button>

                            <div class="modal fade" id="exampleModalimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Update profile Photo</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                      <div class="col-4">
                                        <img class="uploadphoto" src="upload/<?php echo $row['image'] ?>" alt="" srcset="">
                                      </div>
                                      <div class="col-8">
                                      <form action="upload_photo.php" method="post" enctype="multipart/form-data">
                                        <div>
                                          <input class="removepButton btn" type="button" value="Remove"> 
                                        </div>
                                        <div>
                                          <input class="btn" name="fileToUpload" required type="file" value="Upload"> 
                                        </div>
                                      <div class="modal-footer">
                                        <button type="submit" name="profileUPload" class="btn btn-primary">Update Profile</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </form>
                                    </div>
                                    </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-9 my_profile_update">
                
                
                  <div class="customers_name">
                    <h5><?php echo $row['first_name'] ." ".$row['last_name'] ?></h5>
                  </div>
                  <hr>
                  <div class="profile_detals" id="show">
                      <div class="customers_id">
                        <span>Customers Id</span>
                        <input type="text" value="<?php echo $row['customers_id'] ?>">
                      </div>
                      <div class="account_num">
                        <span>Account Number</span>
                        <input type="text" value="<?php echo $row['account_no'] ?>">
                      </div>
                      <div>
                          <span>Password</span>
                          <input  class="password_input" type="password" value=<?php echo $row['password']; ?> readonly>
                          <button type="button" class="btn btn-primary password_btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Update</button>

                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <?php 
                                    $pwd_matchErr=$current_pwdErr="";

                                    if(isset($_POST['update_password'])){
                                      $current_pwd=get_safe_value($con,$_POST['current_password']);
                                      $new_pwd=get_safe_value($con,$_POST['new_password']);
                                      $conf_pwd=get_safe_value($con,$_POST['confirm_password']);

                                      if($current_password==$current_pwd){
                                        if($new_pwd==$conf_pwd){
                                          $QUERY1= mysqli_query($con,"UPDATE users SET users.password='{$new_pwd}' WHERE customers_id='{$cid}'") or die(mysqli_error($con));
                                        }else{
                                          $pwd_matchErr= "Password didn't matched!";
                                        }

                                      }else{
                                        $current_pwdErr= "Invalid password";
                                      }
                                    }
                                  ?>
                                  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Current Passord:</label>
                                      <input type="password" name="current_password" class="form-control" id="recipient-name" placeholder="Enter current password">
                                      <?php echo $current_pwdErr; ?>
                                    </div>
                                    <div class="form-group">
                                      <label for="message-text" class="col-form-label">New Password:</label>
                                      <input type="password" name="new_password" class="form-control" id="recipient-name" placeholder="Enter New password">
                                    </div>
                                    <div class="form-group">
                                      <input type="password" name="confirm_password" class="form-control" id="recipient-name" placeholder="Confirm New password">
                                      <?php echo $pwd_matchErr; ?>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" name="update_password" class="btn btn-primary">Update Password</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                      </div>
                      <div>
                          <span>Mobile number</span>
                          <input class="mobile_input" type="text" value="<?php echo $row['mobile_no'] ?>" readonly>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Update</button>

                          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Update Mobile Number</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <?php 
                                      $pwdErr='';
                                      if(isset($_POST['mobUpdate'])){
                                        $mob_no=get_safe_value($con,$_POST['mob_no']);
                                        $curr_pwd=get_safe_value($con,$_POST['curr_pwd']);
                                        if($current_password==$curr_pwd){
                                          $QUERY2= mysqli_query($con,"UPDATE users SET users.mobile_no='{$mob_no}' WHERE customers_id='{$cid}'") or die(mysqli_error($con));
                                        }else{
                                          $pwdErr="Invalid password";
                                        }
                                      }
                                    ?>
                                  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                    <div class="form-group">
                                      <input type="text" name="mob_no" class="form-control" id="recipient-name" placeholder="Enter new number">
                                    </div>
                                    <div class="form-group">
                                      <input type="password" name="curr_pwd" class="form-control" id="recipient-name" placeholder="Confirm password">
                                      <?php echo $pwdErr; ?>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" name="mobUpdate" class="btn btn-primary">Update Number</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div>
                          <span>Email</span>
                          <input class="email_input" type="email" value="<?php echo $row['email_id'] ?>" readonly>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Update</button>

                          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Update Email</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <?php 
                                  $pwdErr=$emailErr="";
                                  // $new_email="";
                                  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                  //   if (empty($_POST["new_email"])) {
                                  //     $emailErr = "Email is required";
                                  //     } else {
                                  //       $email_id = test_input($_POST["new_email"]);
                                  //       // check if e-mail address is well-formed
                                  //       if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
                                  //         $emailErr = "Invalid email format";
                                  //       }
                                  //     }
                                  // }

                                  if(isset($_POST['email_update'])){
                                    $new_email2=get_safe_value($con,$_POST['new_email']);
                                    $curr_pswd=get_safe_value($con,$_POST['currPwd']);
                                    if($current_password==$curr_pswd){
                                      $QUERY3= mysqli_query($con,"UPDATE users SET users.email_id='{$new_email2}' WHERE customers_id='{$cid}'") or die(mysqli_error($con));
                                    }else{
                                      $pwdErr="Invalid passord";
                                    }
                                  }
                                
                                ?>
                                  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                    <div class="form-group">
                                      <input type="text" name="new_email" class="form-control" id="recipient-name" placeholder="Enter new Email">
                                      <?php echo $emailErr; ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="password" name="currPwd" class="form-control" id="recipient-name" placeholder="Confirm password">
                                      <?php echo $pwdErr; ?>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" name="email_update" class="btn btn-primary">Update Password</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="occupation_input">
                          <span >Occupation details</span>
                          <input  type="text" placeholder="Student" readonly>
                      </div>
                      <?php 
                          }
                        }
                      ?>
                  </div>
                  <hr/>
                  <div class="address_detail">
                        <?php 
                          $query5=mysqli_query($con,"SELECT * FROM `customer_address` WHERE customers_id= 'BFU3071694'") or die(mysqli_error($con));
                          if(mysqli_num_rows($query5)>0){
                            while($row5=mysqli_fetch_assoc($query5)){
                        ?>
                    <span>Residence Address</span>
                    <textarea type="text" placeholder="<?php echo $row5['street_name'].",&nbsp;".$row5['city'].",&nbsp;".$row5['state']."-&nbsp;".$row5['pincode'] ."\n"."Landmark-".$row5['landmark']; ?>" readonly></textarea>
                   <?php 
                      }
                    }
                   ?>
                  </div>
                  <hr/>
                  <div class="virual_card">
                    <?php 
                        $query6=mysqli_query($con,"SELECT * FROM virtual_card WHERE customers_id='{$cid}'") OR DIE(mysqli_error($con));
                        if(mysqli_num_rows($query6)>0){
                          while($row6=mysqli_fetch_assoc($query6)){
                      ?>
                      <strong>Virtual Card details</strong>
                      <div>
                          <span>Card number</span>
                          <input class="vCard_input" type="text" value="<?php echo $row6['card_number']; ?>" readonly >
                      </div>
                      <div>
                          <span>CVV</span>
                          <input class="vCvv_input" type="password" value="<?php echo $row6['cvv']; ?>" id="myInput" readonly>
                          <button class="btn btn-primary" type="button"  onclick="viewPassword()" >Show CVV</button>
                      </div>
                      <div>
                          <span>Valid Upto</span>
                          <input class="vValid_input" type="text" value="<?php echo $row6['valid_upto'];?>" readonly>
                      </div>
                      <div>
                          <div>
                            <span>PIN</span>
                            <input class="vPin_input" type="password" name="" value="<?php echo $row6['pin']; ?>" id="myInput1" readonly>
                            <button type="button" class="btn btn-primary" onclick="viewPassword2()" >Show PIN</button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo">Update</button>

                                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <?php 
                                          $wrong_pin=$pwdErr="";
                                          $current_pin=$row6['pin'];
                                          if(isset($_POST['update_pin'])){
                                              $curr_pin=get_safe_value($con,$_POST['curr_pin']);
                                              $new_pin=get_safe_value($con,$_POST['new_pin']);
                                              $confirm_pwd=get_safe_value($con,$_POST['confirm_pwd']);

                                              if($current_pin==$curr_pin){
                                                if($confirm_pwd==$current_password){
                                                  $query7=mysqli_query($con,"UPDATE `virtual_card` SET virtual_card.pin='{$new_pin}' WHERE virtual_card.customers_id='{$cid}'") OR DIE(mysqli_error($con));
                                                }else{
                                                  $pwdErr="Invalid Password";
                                                }
                                              }else{
                                                $wrong_pin="Current Card pin is Invalid";
                                              }
                                          }
                                        ?>
                                        <div class="modal-body">
                                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                            <div class="form-group">
                                                 <input type="password" name="curr_pin" class="form-control" id="recipient-name" placeholder="Enter Current pin">
                                                 <?php echo $wrong_pin;?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="new_pin" class="form-control" id="recipient-name" placeholder="Enter New pin">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="confirm_pwd" class="form-control" id="recipient-name" placeholder="Confirm password">
                                                <?php echo $pwdErr;?>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" name="update_pin" class="btn btn-primary">Update PIN</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                          </div>
                          <script>
                              $(document).ready(function(){  
                                $('#div_refresh').load("date.php");
                                  setInterval(function(){   
                                      $("#div_refresh").load("date.php");
                                  }, 1000);
                              });
                            </script>
                          <div id="div_refresh" >
                          </div>
                      </div>
                      <?php 
                          }
                        }
                      ?>
                  </div>
                  <hr/>
                  <div class="scheme_details">
                      <strong>Enrolled Schems</strong>
                      <div>
                          <span>Schem name</span>
                          <input type="text" class="" name="" placeholder="21 Din me dubble">
                          <button>Details</button>
                      </div>
                      <div>
                          <span>Schem name</span>
                          <input type="text" name="" placeholder="Mutual funds">
                          <button>Details</button>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require ('footer.inc.php');
?>