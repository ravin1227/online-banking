<?php 
// require('connection.inc.php');
// require('functions.inc.php');


    //  if(isset($_GET['type']) && $_GET['type']!=''){
    //      $type=get_safe_value($con,$_GET['type']);
    //      if($type=='status'){
    //         $operation=get_safe_value($con,$_GET['operation']);
    //         $customers_id=get_safe_value($con,$_GET['customers_id']);

    //          if($operation=='active'){
    //              $status=1;
    //             }else{
    //                 $status=0;
    //             }
    //             $update_status=mysqli_query($con,"UPDATE virtual_card SET virtual_card.status='{$status}' WHERE virtual_card.customers_id='{$customers_id}'") OR DIE(mysqli_error($con));
    //           }
    //         }
    //      if($row6['status']==1){
    //          echo "<span> Temporarily block your card </span>
    //                  <button class='btn'> <a href='?type=status&operation=deactive&customers_id=".$row6['customers_id']."'>Block</a>
    //                 </button>";
    //             }else{
    //                 echo "<span class='btn'> Unblock your card 
    //                  <a href='?type=status&operation=active&customers_id=".$row6['customers_id']."'>Unblock</a></span>";
    //             }
                     echo date('H:i:s') ;        
  ?>