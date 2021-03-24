<?php 
    require ('header.inc.php');

    //define variable and set to empty values
    $f_name=$l_name=$dop=$m_number=$email_id=$gender=$addhar_number=$opening_ammount=$street_add=$city_add=$landmark_add=$pincode_add
        =$state_add=$c_occupation=$c_username=$c_password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["f_name"])) {
              echo '<script>alert("Full name is required");
                                window.location.href="new_account.php";
                          </script>';
            } else {
              $f_name = test_input($_POST["f_name"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/^[a-zA-Z']*$/",$f_name)) {
                echo '<script>alert("Only letters are allowed");
                                window.location.href="new_account.php";
                          </script>';
              }
            }

            if (empty($_POST["l_name"])) {
              echo '<script>alert("Full Name is required");
                                window.location.href="new_account.php";
                          </script>';
            } else {
              $l_name = test_input($_POST["l_name"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/^[a-zA-Z']*$/",$l_name)) {
                echo '<script>alert("Only letters are allowed");
                                window.location.href="new_account.php";
                          </script>';
              }
            }

            if (empty($_POST["dop"])) {
              echo '<script>alert("Date Of Birth is required");
                                window.location.href="new_account.php";
                          </script>';
            } else {
              $dop = test_input($_POST["dop"]);
            }

            if (empty($_POST["m_number"])) {
                echo '<script>alert("Mobile number is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $m_number = test_input($_POST["m_number"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9]*$/",$m_number)) {
                  echo '<script>alert("Only numbers are allowed");
                                window.location.href="new_account.php";
                          </script>';
                }
              }

              if (empty($_POST["email_id"])) {
                echo '<script>alert("Email is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $email_id = test_input($_POST["email_id"]);
                // check if e-mail address is well-formed
                if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
                  echo '<script>alert("Invalid email format");
                                window.location.href="new_account.php";
                          </script>';
                }
              }

              if (empty($_POST["gender"])) {
                echo '<script>alert("Gender is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $gender = test_input($_POST["gender"]);
              }

              if (empty($_POST["addhar_number"])) {
                echo '<script>alert("Aadhar number is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $addhar_number = test_input($_POST["addhar_number"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9]{10}+$/",$addhar_number)) {
                  echo '<script>alert("Only numbers are allowed and must be 10 number");
                                window.location.href="new_account.php";
                          </script>';
                }
              }

              if (empty($_POST["street_add"])) {
                echo '<script>alert("Full address is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $street_add = test_input($_POST["street_add"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9 ]*$/",$street_add)) {
                  echo '<script>alert("Only letters and number are allowed");
                                window.location.href="new_account.php";
                          </script>';
                }
              }
              
              if (empty($_POST["city_add"])) {
                echo '<script>alert("Full address is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $city_add = test_input($_POST["city_add"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9 ]*$/",$city_add)) {
                  echo '<script>alert("Only letters and number are allowed");
                                window.location.href="new_account.php";
                          </script>';
                }
              }

              if (empty($_POST["landmark_add"])) {
                echo '<script>alert("Full address is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $landmark_add = test_input($_POST["landmark_add"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9 ]*$/",$landmark_add)) {
                  echo '<script>alert("Only letters and number are allowed");
                                window.location.href="new_account.php";
                          </script>';
                }
              }

              if (empty($_POST["pincode_add"])) {
                echo '<script>alert("Full address is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $pincode_add = test_input($_POST["pincode_add"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9]*$/",$pincode_add)) {
                  echo '<script>alert("Only numbers are allowed");
                                window.location.href="new_account.php";
                          </script>';
                }
              }
              
              if (empty($_POST["state_add"])) {
                echo '<script>alert("Full address is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $state_add = test_input($_POST["state_add"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$state_add)) {
                  echo '<script>alert("Only letters are allowed");
                                window.location.href="new_account.php";
                          </script>';
                }
              }
              
              if (empty($_POST["c_occupation"])) {
                echo '<script>alert("Full Name is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $c_occupation = test_input($_POST["c_occupation"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z]*$/",$c_occupation)) {
                  echo '<script>alert("Only letters are allowed");
                                window.location.href="new_account.php";
                          </script>';
                }
              }
              
              if (empty($_POST["c_username"])) {
                echo '<script>alert("Username is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $c_username = test_input($_POST["c_username"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9!@#$%^&]{5,}$/",$c_username)) {
                  echo '<script>alert("Only letters/specail cahracters are allowed must be more than 5 length");
                                window.location.href="new_account.php";
                          </script>';
                }
              }
              
              if (empty($_POST["c_password"])) {
                echo '<script>alert("Password is required");
                                window.location.href="new_account.php";
                          </script>';
              } else {
                $c_password = test_input($_POST["c_password"]);
                // check if name only contains letters and whitespace
                if (strlen($_POST["c_password"]) <= '8') {
                  echo '<script>alert("Your Password Must Contain At Least 8 Characters!");
                                window.location.href="new_account.php";
                          </script>';
                  }
                  elseif(!preg_match("#[0-9]+#",$c_password)) {
                      echo '<script>alert("Your Password Must Contain At Least 1 Number!");
                                window.location.href="new_account.php";
                          </script>';
                      
                  }
                  elseif(!preg_match("#[A-Z]+#",$c_password)) {
                      echo '<script>alert("Your Password Must Contain At Least 1 Capital Letter!");
                                window.location.href="new_account.php";
                          </script>';
                  }
                  elseif(!preg_match("#[a-z]+#",$c_password)) {
                      echo '<script>alert("Your Password Must Contain At Least 1 Lowercase Letter!");
                                window.location.href="new_account.php";
                          </script>';
                  } else {
                      echo '<script>alert("Please Entered a valid password!");
                                window.location.href="new_account.php";
                          </script>';
                  }
              }

              if(empty($_POST["acceptedterms"])){
                  $chechErr ="You must Agree Our Terms And Condition";
              }
            }
              if(isset($_POST['create_account'])){

                $firts_name=$f_name;
                $last_name=$l_name;
                $dateOfBirth=$dop;
                $mobile_number=$m_number;
                $email_Id=$email_id;
                $gender1=$gender;
                $aadhar_number=$addhar_number;
                $street_address=$street_add;
                $city_address=$city_add;
                $landmark_address=$landmark_add;
                $pincode_address=$pincode_add;
                $state_address=$state_add;
                $Coccupation=$c_occupation;
                $Cusername=$c_username;
                $Cpassword=$c_password;


              $randomNum= substr(str_shuffle("0123456789"),0,7);
              $customerId= "BFU".$randomNum;

              $randomNum2= substr(str_shuffle("0123456789"),0,5);
              $accountNo= "BFUAC".$randomNum2;
              $balance=10000;

              $randomNum3=substr(str_shuffle("0123456789"),0,16);
              $card_number=$randomNum3;

              $randomNum4=substr(str_shuffle("0123456789"),0,3);
              $cvv=$randomNum4;

              $randomNum5=substr(str_shuffle("0123456789"),0,4);
              $pin=$randomNum5;

              $valid_upto="";

              $status=1;


             mysqli_query($con,"INSERT INTO users (customers_id,first_name,last_name,dob,mobile_no,email_id,gender,aadhar_no,occupation,username,password,account_no)
                            VALUES ('$customerId','$firts_name','$last_name','$dateOfBirth','$mobile_number','$email_Id','$gender1','$aadhar_number','$Coccupation','$Cusername','$Cpassword','$accountNo')") or die(mysqli_error($con));

             mysqli_query($con,"INSERT INTO customer_balance (customers_id,balance,account_no) VALUES ('$customerId','$balance','$accountNo')") or die(mysqli_error($con));

             mysqli_query($con,"INSERT INTO customer_address (customers_id,street_name,city,landmark,pincode,state) 
                            VALUES ('$customerId','$street_address','$city_address','$landmark_address','$pincode_address','$state_address')") or die(mysqli_error($con));
              
             mysqli_query($con,"INSERT INTO virtual_card (customers_id,card_number,cvv,valid_upto,pin,status) VALUES ('$customerId','$card_number','$cvv','$valid_upto','$pin','$status')") or die(mysqli_error($con));
              // header("Location: {$hostname}/login.php");

              echo '<script>alert("Login To Proceed");
                        window.location.href="login.php";
                  </script>';
        }

?>
        <div class="col-7 new_account">`
            <div class="card">
                <div>
                    <h5>Open New Account</h5>
                    <hr/>
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="c_name">
                            <span>
                                Name:
                            </span>
                            <input class="f_name" name="f_name" type="text" placeholder="First Name">
                            <input class="l_name"  name="l_name" type="text" placeholder="Last Name">
                        </div>
                        <div  class="c_date">
                            <span>Date Of Birth:</span>
                            <input  name="dop" type="date" name="">
                        </div>
                        <div class="c_mobile">
                            <span>Mobile no:</span>
                            <input  type="text" name="m_number" placeholder="Mobile Number ">
                        </div>
                        <div class="c_email">
                            <span>Email Id:</span>
                            <input  type="email"  name="email_id" placeholder="Email Id">
                        </div>
                        <div class="c_gender">
                            <span>Gender:</span>
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
                            <span>Male</span>
                            <input  type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
                            <span>Female</span>
                        </div>
                        <div class="c_aadhar">
                            <span>Aadhar No:</span>
                            <input  type="text" name="addhar_number" id="" placeholder="Aadhar Number ">
                        </div>
                        <div class="c_opening_amount">
                            <span>Opening Amount:</span>
                            <input type="text"  name="opening_ammount" placeholder="&#8377;10000" readonly>

                        </div>
                        <div class="address">
                            <span>Address:</span>
                            <textarea type="text"  name="street_add" placeholder="Street Name/Apartment Name"></textarea>
                            <input class="address_c"  name="city_add" type="text" placeholder="City">
                            <input type="text"  name="landmark_add" placeholder="Landmark">
                            <input class="address_p"  name="pincode_add" type="text" placeholder="Pincode">
                            <input type="text"  name="state_add" placeholder="State">
                        </div>
                        <div class="c_occupation">
                            <span>Occupation Details: </span>
                            <input type="text" name="c_occupation" placeholder="Occupation">
                        </div>
                        <div class="c_username">
                            <span>Username:</span>
                            <input type="text" name="c_username" placeholder="Username">
                        </div>
                        <div class="c_password">
                            <span>Password:</span>
                            <input  type="password" name="c_password" id="" placeholder="Password">
                        </div>
                        <div class="terms_and_conditions">
                            <span><input type="checkbox" name="acceptedterms" value="1"></span>
                            I,hereby accepts all the terms and conditions. Read Terms and condition <a href="">click here</a>.
                        </div>
                        
                        <div class="open_account">
                            <input type="submit" name="create_account" value="Open Account"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php 
        require('footer.inc.php');
    ?>