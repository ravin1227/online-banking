<?php 
    function pr($arr){
        echo "<pre>";
        print_r($arr);
    }

    function prx($arr){
        echo "<pre>";
        print_r($arr);
        die();
    }

    function get_safe_value($con,$str){
        if($str!=''){
            $str=trim($str);
        return mysqli_real_escape_string($con,$str);
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      
?>