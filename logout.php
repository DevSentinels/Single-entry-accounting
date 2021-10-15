<?php

    include_once './includes/dbprocess.php';
    unset($_SESSION['business_name']); 
    unset($_SESSION['business_owner']); 
    $_SESSION ['isLoggedin'] = false;
    $_SESSION ['response'] = "Successfully Logout!";
    $_SESSION ['res_type']= "success";
    header("Location: index.php");
?>