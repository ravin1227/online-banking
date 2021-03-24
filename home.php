<?php 
    require ('header.inc.php');
    if(!isset($_SESSION["username"])){
        header("Location: {$hostname}/index.php");
      }
?>
        <div class="col-9">
            <div class="row">
                <div class="col-4 warning ">
                    <div class="card warning_notice">
                        <div class="">
                            <h6>Caution</h6>
                            <ul>
                                <li>
                                    <p>Beware of Fake SMSes and Fake Phone Calls</p> 
                                </li>
                                <li>
                                    <p>Never share your CVV/PIN/OTP/Expiry Date or any other info of your card/account over phone or any other media. Bank never asks any such information from customers.</p> 
                                </li>
                                <li>
                                    <p>Fake addresses and phone numbers of Bank's branches are created by miscreants on google search.</p> 
                                </li>
                                <li>
                                    <p>Please do not search for any branch address on google search or map.</p> 
                                </li>
                                <li>
                                    <p>Use Bank's own website only for any contact details</p> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php 
    require('footer.inc.php');
?>