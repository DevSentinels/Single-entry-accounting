<?php
session_start();
include_once 'dbconnect.php';



// Registration Process

if(isset($_POST['signup_btn'])){

    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $Fullname = $_POST['fname'];
    $BusinessName = $_POST['bname'];
    $PassW = mysqli_real_escape_string($conn, password_hash ($_POST['password'],PASSWORD_DEFAULT));

    $sqlforNoAccount = "SELECT * FROM tblaccounts WHERE email ='$Email'";
    $sqlrun = mysqli_query($conn, $sqlforNoAccount);

    if(mysqli_num_rows($sqlrun)>0){
        header("Location: ../register.php");
        $_SESSION ['response'] = "Email Address Already Exists!";
        $_SESSION ['res_type']= "error";
    }else{
    
    $sqlforAccounts = "INSERT INTO tblaccounts(user_id,email, password, business_name, business_owner) VALUES ('',?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sqlforAccounts)){
        echo "SQL Error";
    }else{
        mysqli_stmt_bind_param($stmt,"ssss",$Email,$PassW,$BusinessName,$Fullname);
        mysqli_stmt_execute($stmt);
    }
       
        header("Location: ../index.php");
        $_SESSION ['response'] = "Successfully Account Created!";
        $_SESSION ['res_type']= "success";
    }
}

//Login Process

if(isset($_POST['login_btn'])){
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $sqlforNoAccount = "SELECT * FROM tblaccounts WHERE email ='$Email'";
    $stmt = $conn->prepare($sqlforNoAccount);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
            $PasswordinDB = $row['password'];
            $BusinessOwner = $row['business_owner'];
            $BusinessName = $row['business_name'];
    }
    
        if(password_verify($Password,$PasswordinDB)){

            header("Location: ../SEA/dashboard.php");
            $_SESSION ['business_name'] = $BusinessName;
            $_SESSION ['business_owner'] = $BusinessOwner;
            $_SESSION ['isLoggedin'] = true;
            $_SESSION ['response'] = "Successfully Login!";
            $_SESSION ['res_type']= "success";
            

        }else{
            header("Location: ../index.php");
            $_SESSION ['response'] = "The Password you’ve entered is incorrect.";
            $_SESSION ['res_type']= "error";
        }

}

//Add Entry Cashbook

if(isset($_POST['add_entry'])){
    
    $BusinessName = mysqli_real_escape_string($conn,   $_SESSION ['business_name']);

    $Date = mysqli_real_escape_string($conn, $_POST['date']);
    $Description = mysqli_real_escape_string($conn, $_POST['description']);
    $Inflows = mysqli_real_escape_string($conn, $_POST['inflows']);
    $Outflows = mysqli_real_escape_string($conn, $_POST['outflows']);


    $sqlforNoAccount = "SELECT balance FROM tblcashbookentry WHERE date = (SELECT MAX(date) FROM tblcashbookentry WHERE business_name = '$BusinessName')";
    $sqlrun = mysqli_query($conn, $sqlforNoAccount);

    if(mysqli_num_rows($sqlrun)>0){
        
    $stmt = $conn->prepare($sqlforNoAccount);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
            $balance = $row['balance'];
    }

    if($Inflows == ""){
        $balance = $balance - $Outflows;
    }else{
        $balance = $balance + $Inflows;
    }


    $sqlforAccounts = "INSERT INTO tblcashbookentry(cbe_id,business_name, date, description, inflows, outflows, balance) VALUES ('',?,?,?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sqlforAccounts)){
        echo "SQL Error";
    }else{
        mysqli_stmt_bind_param($stmt,"ssssss",$BusinessName,$Date,$Description,$Inflows,$Outflows,$balance);
        mysqli_stmt_execute($stmt);
    }
       
        header("Location: ../SEA/cashbook.php");
        $_SESSION ['response'] = "Successfully Added Account";
        $_SESSION ['res_type']= "success";
    
    }else{
    
        if($Inflows == ""){
            $balance = 0 - $Outflows;
        }else{
            $balance = 0 + $Inflows;
        }
    
    
        $sqlforAccounts = "INSERT INTO tblcashbookentry(cbe_id,business_name, date, description, inflows, outflows, balance) VALUES ('',?,?,?,?,?,?);";
        
        $stmt = mysqli_stmt_init($conn);
    
        if(!mysqli_stmt_prepare($stmt, $sqlforAccounts)){
            echo "SQL Error";
        }else{
            mysqli_stmt_bind_param($stmt,"ssssss",$BusinessName,$Date,$Description,$Inflows,$Outflows,$balance);
            mysqli_stmt_execute($stmt);
        }
           
            header("Location: ../SEA/cashbook.php");
            $_SESSION ['response'] = "Successfully Added Account";
            $_SESSION ['res_type']= "success";

    }

}