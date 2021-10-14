<?php
session_start();
include_once 'dbconnect.php';



// Registration Process

if(isset($_POST['signup_btn'])){

    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $Fullname = mysqli_real_escape_string($conn, $_POST['fname']);
    $BusinessName = mysqli_real_escape_string($conn, $_POST['bname']);
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
        $_SESSION ['response'] = "Successfully Created. Login Now!";
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
            $BusinessName = $row['business_name'];
    }
    
        if(password_verify($Password,$PasswordinDB)){

            header("Location: ../SEA/dashboard.php");
            $_SESSION ['business_name'] = $BusinessName;
            $_SESSION ['response'] = "Successfully Login!";
            $_SESSION ['res_type']= "success";
            

        }else{
            header("Location: ../index.php");
            $_SESSION ['response'] = $BusinessName;
            $_SESSION ['res_type']= "error";
        }

}