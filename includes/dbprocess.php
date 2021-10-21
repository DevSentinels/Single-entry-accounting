<?php
session_start();
include_once 'dbconnect.php';
require ('fpdf182/fpdf.php');
require_once "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



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
            $_SESSION ['first'] = true;
            $_SESSION ['year'] = date("Y");
            $_SESSION ['month']= date("m");
            $_SESSION ['res_type']= "success";
            

        }else{
            header("Location: ../index.php");
            $_SESSION ['response'] = "The Password you’ve entered is incorrect.";
            $_SESSION ['res_type']= "error";
        }

}

//Add and Edit Entry on Cashbook 

if(isset($_POST['add_entry'])){
    
    $BusinessName = mysqli_real_escape_string($conn,   $_SESSION ['business_name']);
    $Date = mysqli_real_escape_string($conn, $_POST['date']);
    $Month = substr($Date,5,2);
    $Year = substr($Date,0,4);
    $ID = mysqli_real_escape_string($conn, $_POST['id']);
    $OD = mysqli_real_escape_string($conn, $_POST['od']);
    $OldDate = mysqli_real_escape_string($conn, $_POST['Olddate']);
    $Description = mysqli_real_escape_string($conn, $_POST['description']);
    $Amount = mysqli_real_escape_string($conn, $_POST['amount']);
    
    $Type = mysqli_real_escape_string($conn, $_POST['type_of_entry']);

    
    if($Type == "Outflows"){
        $Inflows = 0;
        $Outflows = $Amount;
    }else{
        $Inflows = $Amount;
        $Outflows = 0;
    }


    if($ID == ""){


        $sqlforNoAccount = "SELECT cbe_id FROM tblcashbookentry WHERE (MONTH(date) = '$Month' AND YEAR(date) = '$Year' AND business_name = '$BusinessName') AND date > '$Date' Order By date, order_by ASC";
        $sqlrun = mysqli_query($conn, $sqlforNoAccount);
    
        if(mysqli_num_rows($sqlrun)>0){
        //This section ay may date na nalampasan
            
            $stmt = $conn->prepare($sqlforNoAccount);
            $stmt->execute();
            $result = $stmt->get_result();
        
            $IDS = array();

            $counter = 0;
            while ($row = $result->fetch_assoc()) {
            $IDS[$counter] = $row['cbe_id'];
            $counter++;
            }

            $numberNeedUpdate = count($IDS);


            $sqlforNoAccount = "SELECT balance, order_by  FROM tblcashbookentry WHERE order_by = (SELECT MAX(order_by) FROM tblcashbookentry WHERE (date = '$Date' AND business_name = '$BusinessName') AND  (MONTH(date) = '$Month' AND YEAR(date) = '$Year')) AND date = '$Date'";
            $stmt = $conn->prepare($sqlforNoAccount);
            $stmt->execute();
            $result = $stmt->get_result();
        
            while ($row = $result->fetch_assoc()) {
                    $prevBal = $row['balance'];
                    $order = $row['order_by'];
            }
            
            if($Inflows == "0"){
                $Balance = $prevBal - $Outflows;
                $order = $order + 1;
            }else{
                $Balance = $prevBal + $Inflows;
                $order = $order + 1;
            }
        
        
        
            $sqlforAccounts = "INSERT INTO tblcashbookentry(cbe_id,business_name, date, order_by, description, inflows, outflows, balance) VALUES ('',?,?,?,?,?,?,?);";
        
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sqlforAccounts)){
                echo "SQL Error";
            }else{
                mysqli_stmt_bind_param($stmt,"sssssss",$BusinessName,$Date,$order,$Description,$Inflows,$Outflows,$Balance);
                mysqli_stmt_execute($stmt);
            }


            for ($i=0; $i < $numberNeedUpdate ; $i++) { 
                # code...
        
                $sqlforNoAccount = "SELECT * FROM tblcashbookentry WHERE cbe_id = '$IDS[$i]'";
                $stmt = $conn->prepare($sqlforNoAccount);
                $stmt->execute();
                $result = $stmt->get_result();
            
                while ($row = $result->fetch_assoc()) {
                        $update_inflows = $row['inflows'];
                        $update_outflows = $row['outflows'];
                        $update_date = $row['date'];
                        $update_order = $row['order_by'];
                        $update_description = $row['description'];
        
                }
        
        
                if($update_inflows == "0"){
                    $Balance = $Balance - $update_outflows;
                }else{
                    $Balance = $Balance + $update_inflows;
                }
        
        
                $sqlforupdateaccount="UPDATE tblcashbookentry SET cbe_id= '$IDS[$i]',business_name='$BusinessName',date='$update_date',order_by='$update_order',description='$update_description',inflows='$update_inflows',outflows='$update_outflows',balance='$Balance' WHERE cbe_id = ?";
        
                $stmt = mysqli_stmt_init($conn);
                
                        
                        if(!mysqli_stmt_prepare($stmt, $sqlforupdateaccount)){
                            echo "SQL Error";
                        }else{
                            mysqli_stmt_bind_param($stmt,"s",$IDS[$i]);
                            mysqli_stmt_execute($stmt);
                        }
            }
        
        
            header("Location: ../SEA/cashbook.php");
            $_SESSION ['response'] = "Successfully Account Added";
            $_SESSION ['res_type']= "success";
            $_SESSION ['year'] = $Year;
            $_SESSION ['month']= $Month;


        }else{
        //This section ay walang date na nalampasan

        $sqlforNoAccount = "SELECT balance FROM tblcashbookentry WHERE (MONTH(date) = '$Month' AND YEAR(date) = '$Year' AND business_name = '$BusinessName') Order By date DESC, order_by DESC LIMIT 1";
        $sqlrun = mysqli_query($conn, $sqlforNoAccount);
    
        //May record
        if(mysqli_num_rows($sqlrun)>0){
            
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
                $balance = $row['balance']; 
        }

        if($Type == "Outflows"){
            $balance = $balance - $Amount;
        }else{
            $balance = $balance + $Amount;
        }


        //Check kung may katulad ng date 

        $sqlforNoAccount = "SELECT MAX(order_by) AS order_by FROM tblcashbookentry WHERE (date = '$Date' AND business_name = '$BusinessName')";
        $sqlrun = mysqli_query($conn, $sqlforNoAccount);
    
        if(mysqli_num_rows($sqlrun)>0){
            
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
                $order = $row['order_by'];
        }

        $order = $order + 1;


        $sqlforAccounts = "INSERT INTO tblcashbookentry(cbe_id,business_name, date, order_by, description, inflows, outflows, balance) VALUES ('',?,?,?,?,?,?,?);";
        
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sqlforAccounts)){
            echo "SQL Error";
        }else{
            mysqli_stmt_bind_param($stmt,"sssssss",$BusinessName,$Date,$order,$Description,$Inflows,$Outflows,$balance);
            mysqli_stmt_execute($stmt);
        }
           
            header("Location: ../SEA/cashbook.php");
            $_SESSION ['year'] = $Year;
            $_SESSION ['month']= $Month;
            $_SESSION ['response'] = "Successfully Account Added";
            $_SESSION ['res_type']= "success";

        }else{

            $order = 1;


            $sqlforAccounts = "INSERT INTO tblcashbookentry(cbe_id,business_name, date, order_by, description, inflows, outflows, balance) VALUES ('',?,?,?,?,?,?,?);";
            
            $stmt = mysqli_stmt_init($conn);
    
            if(!mysqli_stmt_prepare($stmt, $sqlforAccounts)){
                echo "SQL Error";
            }else{
                mysqli_stmt_bind_param($stmt,"sssssss",$BusinessName,$Date,$order,$Description,$Inflows,$Outflows,$balance);
                mysqli_stmt_execute($stmt);
            }
               
                header("Location: ../SEA/cashbook.php");
                $_SESSION ['year'] = $Year;
                $_SESSION ['month']= $Month;
                $_SESSION ['response'] = "Successfully Account Added";
                $_SESSION ['res_type']= "success";


        }   



    
    
        
        //New Entry
        }else{
        
            if($Type == "Outflows"){
                $balance = 0 - $Outflows;
            }else{
                $balance = 0 + $Inflows;
            }
        
            
            $order = 1;
            
            $sqlforAccounts = "INSERT INTO tblcashbookentry(cbe_id,business_name, date, order_by, description, inflows, outflows, balance) VALUES ('',?,?,?,?,?,?,?);";
            
            $stmt = mysqli_stmt_init($conn);
    
            if(!mysqli_stmt_prepare($stmt, $sqlforAccounts)){
                echo "SQL Error";
            }else{
                mysqli_stmt_bind_param($stmt,"sssssss",$BusinessName,$Date,$order,$Description,$Inflows,$Outflows,$balance);
                mysqli_stmt_execute($stmt);
            }
               
                header("Location: ../SEA/cashbook.php");
                $_SESSION ['year'] = $Year;
                $_SESSION ['month']= $Month;
                $_SESSION ['response'] = "Successfully Account Added";
                $_SESSION ['res_type']= "success";
    
            }


        }    
            


    //This Section will be the Edit/Update of Data 
    }else{  



    //Updating Values with no change of date
    if($Date == $OldDate){

    $sqlforNoAccount = "SELECT cbe_id, order_by FROM tblcashbookentry WHERE MONTH(date) = '$Month' AND YEAR(date) = '$Year' AND business_name = '$BusinessName' AND date >= '$Date' Order By date, order_by ASC";
    $stmt = $conn->prepare($sqlforNoAccount);
    $stmt->execute();
    $result = $stmt->get_result();

    $IDS = array();

    $counter = 0;
    $startToCount = 0;
    $prevID = 0;

    while ($row = $result->fetch_assoc()) {



        if($row['cbe_id'] == $ID  && $row['order_by'] == $OD){
            $startToCount = 1;
        }

        if($startToCount == 1){
        
            if($row['cbe_id'] != $ID){
                $IDS[$counter] = $row['cbe_id'];
                $counter++;
            }
        }else{
            $prevID = $row['cbe_id'];
        }

    }

    $numberNeedUpdate = count($IDS);

    
    if($prevID == 0){

    $sqlforNoAccount = "SELECT cbe_id, order_by FROM tblcashbookentry WHERE (order_by = (SELECT MAX(order_by) from tblcashbookentry WHERE date = (SELECT MAX(date) from tblcashbookentry WHERE date < '$Date')) AND date = (SELECT MAX(date) from tblcashbookentry WHERE date < '$Date')) AND (MONTH(date) = '$Month' AND YEAR(date) = '$Year' AND business_name = '$BusinessName')";
    $stmt = $conn->prepare($sqlforNoAccount);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
            $prevID = $row['cbe_id'];
    }    
    }

    $sqlforNoAccount = "SELECT balance FROM tblcashbookentry WHERE cbe_id = '$prevID'";
    $stmt = $conn->prepare($sqlforNoAccount);
    $stmt->execute();
    $result = $stmt->get_result();

    $prevBal = 0;

    while ($row = $result->fetch_assoc()) {
            $prevBal = $row['balance'];
    }
    
    if($Inflows == "0"){
        $balance = $prevBal - $Outflows;
    }else{
        $balance = $prevBal + $Inflows;
    }

    $sqlforupdateaccount="UPDATE tblcashbookentry SET cbe_id= '$ID',business_name='$BusinessName',date='$Date',order_by='$OD',description='$Description',inflows='$Inflows',outflows='$Outflows',balance='$balance' WHERE cbe_id = ?";

    $stmt = mysqli_stmt_init($conn);
    
            
            if(!mysqli_stmt_prepare($stmt, $sqlforupdateaccount)){
                echo "SQL Error";
            }else{
                mysqli_stmt_bind_param($stmt,"s",$ID);
                mysqli_stmt_execute($stmt);
            }


    for ($i=0; $i < $numberNeedUpdate ; $i++) { 
        # code...

        $sqlforNoAccount = "SELECT * FROM tblcashbookentry WHERE cbe_id = '$IDS[$i]'";
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
                $update_inflows = $row['inflows'];
                $update_outflows = $row['outflows'];
                $update_date = $row['date'];
                $update_order = $row['order_by'];
                $update_description = $row['description'];

        }


        if($update_inflows == "0"){
            $balance = $balance - $update_outflows;
        }else{
            $balance = $balance + $update_inflows;
        }


        $sqlforupdateaccount="UPDATE tblcashbookentry SET cbe_id= '$IDS[$i]',business_name='$BusinessName',date='$update_date',order_by='$update_order',description='$update_description',inflows='$update_inflows',outflows='$update_outflows',balance='$balance' WHERE cbe_id = ?";

        $stmt = mysqli_stmt_init($conn);
        
                
                if(!mysqli_stmt_prepare($stmt, $sqlforupdateaccount)){
                    echo "SQL Error";
                }else{
                    mysqli_stmt_bind_param($stmt,"s",$IDS[$i]);
                    mysqli_stmt_execute($stmt);
                }
    }


    header("Location: ../SEA/cashbook.php");
    $_SESSION ['response'] = "Successfully Account Updated";
    $_SESSION ['res_type']= "success";
    $_SESSION ['year'] = $Year;
    $_SESSION ['month']= $Month;

        

    //Change date also
    }else{




    }
    }   
}



//Delete Record

if(isset($_POST['delete_btn'])){


    $BusinessName = mysqli_real_escape_string($conn,   $_SESSION ['business_name']);
    $ID=$_POST['delete_id'];
    $Date=$_POST['delete_date'];
    $OD=$_POST['delete_od'];
    $Month = substr($Date,5,2);
    $Year = substr($Date,0,4);


    $sqlforNoAccount = "SELECT cbe_id, order_by FROM tblcashbookentry WHERE MONTH(date) = '$Month' AND YEAR(date) = '$Year' AND business_name = '$BusinessName' AND date >= '$Date' Order By date, order_by ASC";
    $stmt = $conn->prepare($sqlforNoAccount);
    $stmt->execute();
    $result = $stmt->get_result();

    $IDS = array();

    $counter = 0;
    $startToCount = 0;
    $prevID = 0;

    while ($row = $result->fetch_assoc()) {



        if($row['cbe_id'] == $ID  && $row['order_by'] == $OD){
            $startToCount = 1;
        }

        if($startToCount == 1){
        
            if($row['cbe_id'] != $ID){
                $IDS[$counter] = $row['cbe_id'];
                $counter++;
            }
        }else{
            $prevID = $row['cbe_id'];
        }

    }

    $numberNeedUpdate = count($IDS);

    
    if($prevID == 0){

    $sqlforNoAccount = "SELECT cbe_id, order_by FROM tblcashbookentry WHERE (order_by = (SELECT MAX(order_by) from tblcashbookentry WHERE date = (SELECT MAX(date) from tblcashbookentry WHERE date < '$Date')) AND date = (SELECT MAX(date) from tblcashbookentry WHERE date < '$Date')) AND (MONTH(date) = '$Month' AND YEAR(date) = '$Year' AND business_name = '$BusinessName')";
    $stmt = $conn->prepare($sqlforNoAccount);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
            $prevID = $row['cbe_id'];
    }    
    }

    $sqlforNoAccount = "SELECT balance FROM tblcashbookentry WHERE cbe_id = '$prevID'";
    $stmt = $conn->prepare($sqlforNoAccount);
    $stmt->execute();
    $result = $stmt->get_result();

    $prevBal = 0;

    while ($row = $result->fetch_assoc()) {
            $prevBal = $row['balance'];
    }

    

    $sqlfordeletfiletask="DELETE FROM tblcashbookentry WHERE cbe_id=?";

    $stmt = mysqli_stmt_init($conn);


    if(!mysqli_stmt_prepare($stmt, $sqlfordeletfiletask)){
        echo "SQL Error";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$ID);
        mysqli_stmt_execute($stmt);
    }



    $balance =  $prevBal;

    for ($i=0; $i < $numberNeedUpdate ; $i++) { 
        # code...

        $sqlforNoAccount = "SELECT * FROM tblcashbookentry WHERE cbe_id = '$IDS[$i]'";
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();
    
        while ($row = $result->fetch_assoc()) {
                $update_inflows = $row['inflows'];
                $update_outflows = $row['outflows'];
                $update_date = $row['date'];
                $update_order = $row['order_by'];
                $update_description = $row['description'];

        }


        if($update_inflows == "0"){
            $balance = $balance - $update_outflows;
        }else{
            $balance = $balance + $update_inflows;
        }


        $sqlforupdateaccount="UPDATE tblcashbookentry SET cbe_id= '$IDS[$i]',business_name='$BusinessName',date='$update_date',order_by='$update_order',description='$update_description',inflows='$update_inflows',outflows='$update_outflows',balance='$balance' WHERE cbe_id = ?";

        $stmt = mysqli_stmt_init($conn);
        
                
                if(!mysqli_stmt_prepare($stmt, $sqlforupdateaccount)){
                    echo "SQL Error";
                }else{
                    mysqli_stmt_bind_param($stmt,"s",$IDS[$i]);
                    mysqli_stmt_execute($stmt);
                }
    }

    $_SESSION ['year'] = $Year;
    $_SESSION ['month']= $Month;



}


if(isset($_POST['generate-monthly'])){


    $WhatWillGenerate = $_POST['whatshouldIDOM'];
    $Month = $_POST['monthG'];
    $Year = $_POST['yearM'];
    $BusinessName = mysqli_real_escape_string($conn,   $_SESSION ['business_name']);
    $BusinessOwner = mysqli_real_escape_string($conn,   $_SESSION ['business_owner']);

        $MonthDetails = array('',
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July ',
        'August',
        'September',
        'October',
        'November',
        'December');

   
    

    if($WhatWillGenerate == "Income Statement"){


    }
    else if($WhatWillGenerate == "Cash Flow"){


    }
    else if($WhatWillGenerate == "Print"){

        $fileName = $BusinessName .'-Cashbook Entry Records-' . $MonthDetails[$Month].'-'.$Year.'.pdf';


        
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('../img/logo.png',100,6,170);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Move to the right
    
    $this->Ln(10);
    // Title
    $this->Cell(100);
    $this->Cell(10,10,'CASHBOOK ENTRY RECORDS',0,0,'C');
    $this->Ln(7);
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

// Page footer
function headerTable()
{
  
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Page number
    $this->Cell(5);
    $this->Cell(20,10,'Date',1,0,'C');
    $this->Cell(80,10,'Description',1,0,'C');
    $this->Cell(30,10,'Inflows',1,0,'C');
    $this->Cell(30,10,'Outflows',1,0,'C');
    $this->Cell(30,10,'Balance',1,0,'C');
    $this->Ln();
}
function queryTable($Month, $Year, $BusinessName,$conn){
        $this->SetFont('Arial','B',10);
       
      
        $sqlforNoAccount = "SELECT date, description, inflows, outflows, balance FROM tblcashbookentry WHERE ((MONTH(date) = '$Month' AND YEAR(date)= '$Year') AND (business_name = '$BusinessName')) Order By date, order_by ASC";
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
                $this->Cell(5);
                $this->Cell(20,10,$row['date'],1,0,'L');
                $this->Cell(80,10,$row['description'],1,0,'L');
                $this->Cell(30,10,$row['inflows'],1,0,'C');
                $this->Cell(30,10,$row['outflows'],1,0,'C');
                $this->Cell(30,10,$row['balance'],1,0,'C');
                $this->Ln();
        }
}

function Signatory($BusinessOwner, $BusinessName)
{
    $this->Ln(8);
    $this->SetFont('Arial','B',12);
    $this->Cell(15);
    $this->Cell(30,10,$BusinessOwner,0,0,'C');
    $this->Ln(6);
    $this->Cell(15);
    $this->SetFont('Arial','B',12);
    $this->Cell(30,10,$BusinessName .', Owner',0,0,'C');
    // Line break
    $this->Ln(20);
}


function Month($MonthDetails, $Year)
{
    $this->Ln(8);
    $this->SetFont('Arial','B',12);
    $this->Cell(15);
    $this->Cell(30,10,'Month of '.$MonthDetails . ' ' . $Year,0,0,'C');
    // Line break
    $this->Ln(10);
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Legal',0);
$pdf->Month($MonthDetails[$Month], $Year);
$pdf->headerTable();
$pdf->queryTable($Month, $Year, $BusinessName,$conn);
$pdf->Signatory($BusinessOwner, $BusinessName);
$pdf->Output($fileName, 'D');


    }
    else if($WhatWillGenerate == "Download"){

        $spreadsheet = new Spreadsheet();
        $Excel_writer = new Xlsx($spreadsheet);


        $spreadsheet->getProperties()->setCreator($BusinessOwner)
        ->setLastModifiedBy($BusinessOwner)
        ->setTitle($BusinessName.'-Cashbook Entry Report-'.$MonthDetails[$Month].'-'.$Year )
        ->setSubject('Cashbook Entry Report')
        ->setDescription('Cashbook Entry Report')
        ->setKeywords('Cashbook Entry Report')
        ->setCategory('Cashbook Entry Report');
          
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
          
        $activeSheet->setCellValue('A1', 'Date');
        $activeSheet->setCellValue('B1', 'Description');
        $activeSheet->setCellValue('C1', 'Inflows');
        $activeSheet->setCellValue('D1', 'Ouflows');
        $activeSheet->setCellValue('E1', 'Balance');

        $activeSheet->setTitle($MonthDetails[$Month]);

        foreach ($activeSheet->getColumnIterator() as $column) {
            $activeSheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'center' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $activeSheet->getStyle('A1:E1')->applyFromArray($styleArray);

          
        $sqlforNoAccount = "SELECT date, description, inflows, outflows, balance FROM tblcashbookentry WHERE ((MONTH(date) = '$Month' AND YEAR(date)= '$Year') AND (business_name = '$BusinessName')) Order By date, order_by ASC";
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();

        $i = 2;
        while ($row = $result->fetch_assoc()) {
                $activeSheet->setCellValue('A'.$i , $row['date']);
                $activeSheet->setCellValue('B'.$i , $row['description']);
                $activeSheet->setCellValue('C'.$i , $row['inflows']);
                $activeSheet->setCellValue('D'.$i , $row['outflows']);
                $activeSheet->setCellValue('E'.$i , $row['balance']);
                $i++;
            }
        
          
        $filename = $BusinessName .'-Cashbook Entry Records-' . $MonthDetails[$Month].'-'.$Year.'.xlsx';

          
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='. $filename);
        header('Cache-Control: max-age=0');
        $Excel_writer->save('php://output');

    }else{
        header("Location: ../SEA/cashbook.php");
        $_SESSION ['year'] = date("Y");
        $_SESSION ['month']= date("m");
    }

}



if(isset($_POST['generate-quarterly'])){


    $WhatWillGenerate = $_POST['whatshouldIDOQ'];
    $Quarter = $_POST['quarterG'];
    $Year = $_POST['yearQ'];
    $BusinessName = mysqli_real_escape_string($conn,   $_SESSION ['business_name']);
    $BusinessOwner = mysqli_real_escape_string($conn,   $_SESSION ['business_owner']);

    
    $Months = array();

    $MonthDetails = array('',
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July ',
    'August',
    'September',
    'October',
    'November',
    'December',);

    
    if($Quarter == "Q1"){
        $Months[0] = 1;
        $Months[1] = 2;
        $Months[2] = 3;
    }
    else if($Quarter == "Q2"){
        $Months[0] = 4;
        $Months[1] = 5;
        $Months[2] = 6;
    }
    else if($Quarter == "Q3"){
        $Months[0] = 7;
        $Months[1] = 8;
        $Months[2] = 9;
    }
    else if($Quarter == "Q4"){
        $Months[0] = 10;
        $Months[1] = 11;
        $Months[2] = 12;
    }









    if($WhatWillGenerate == "Income Statement"){

       

    }
    else if($WhatWillGenerate == "Cash Flow"){

        

    }
    else if($WhatWillGenerate == "Print"){
        
        $fileName = $BusinessName .'-Cashbook Entry Records-' . $MonthDetails[$Months[0]].'-to-'.$MonthDetails[$Months[2]].'-'.$Year.'.pdf';

        
        
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('../img/logo.png',100,6,170);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Move to the right
    
    $this->Ln(10);
    // Title
    $this->Cell(100);
    $this->Cell(10,10,'CASHBOOK ENTRY RECORDS',0,0,'C');
    $this->Ln(7);
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

// Page footer
function headerTable()
{
  
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Page number
    $this->Cell(5);
    $this->Cell(20,10,'Date',1,0,'C');
    $this->Cell(80,10,'Description',1,0,'C');
    $this->Cell(30,10,'Inflows',1,0,'C');
    $this->Cell(30,10,'Outflows',1,0,'C');
    $this->Cell(30,10,'Balance',1,0,'C');
    $this->Ln();
}
function queryTable($Month, $Year, $BusinessName,$conn){
        $this->SetFont('Arial','B',10);
       
      
        $sqlforNoAccount = "SELECT date, description, inflows, outflows, balance FROM tblcashbookentry WHERE ((MONTH(date) = '$Month' AND YEAR(date)= '$Year') AND (business_name = '$BusinessName')) Order By date, order_by ASC";
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
                $this->Cell(5);
                $this->Cell(20,10,$row['date'],1,0,'L');
                $this->Cell(80,10,$row['description'],1,0,'L');
                $this->Cell(30,10,$row['inflows'],1,0,'C');
                $this->Cell(30,10,$row['outflows'],1,0,'C');
                $this->Cell(30,10,$row['balance'],1,0,'C');
                $this->Ln();
        }
}

function Signatory($BusinessOwner, $BusinessName)
{
    $this->Ln(8);
    $this->SetFont('Arial','B',12);
    $this->Cell(15);
    $this->Cell(30,10,$BusinessOwner,0,0,'C');
    $this->Ln(6);
    $this->Cell(15);
    $this->SetFont('Arial','B',12);
    $this->Cell(30,10,$BusinessName .', Owner',0,0,'C');
    // Line break
    $this->Ln(20);
}


function Month($MonthDetails, $Year)
{
    $this->Ln(8);
    $this->SetFont('Arial','B',12);
    $this->Cell(15);
    $this->Cell(30,10,'Month of '.$MonthDetails . ' ' . $Year,0,0,'C');
    // Line break
    $this->Ln(10);
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Legal',0);

for ($i=0; $i <=2 ; $i++) { 
    # code...
    $pdf->Month($MonthDetails[$Months[$i]], $Year);
    $pdf->headerTable();
    $pdf->queryTable($Months[$i], $Year, $BusinessName,$conn);
}

$pdf->Signatory($BusinessOwner, $BusinessName);
$pdf->Output($fileName, 'D');
      
        


    }
    else if($WhatWillGenerate == "Download"){


        
        $spreadsheet = new Spreadsheet();
        $Excel_writer = new Xlsx($spreadsheet);


        $spreadsheet->getProperties()->setCreator($BusinessOwner)
        ->setLastModifiedBy($BusinessOwner)
        ->setTitle($BusinessName.'-Cashbook Entry Report-'.$MonthDetails[$Months[0]].'-to-'.$MonthDetails[$Months[2]].'-'.$Year )
        ->setSubject('Cashbook Entry Report')
        ->setDescription('Cashbook Entry Report')
        ->setKeywords('Cashbook Entry Report')
        ->setCategory('Cashbook Entry Report');

        for ($r=0; $r <= 2 ; $r++) { 
            # code...

        $spreadsheet->setActiveSheetIndex($r);
        $activeSheet = $spreadsheet->getActiveSheet();
          
        $activeSheet->setCellValue('A1', 'Date');
        $activeSheet->setCellValue('B1', 'Description');
        $activeSheet->setCellValue('C1', 'Inflows');
        $activeSheet->setCellValue('D1', 'Ouflows');
        $activeSheet->setCellValue('E1', 'Balance');

        $activeSheet->setTitle($MonthDetails[$Months[$r]]);

        foreach ($activeSheet->getColumnIterator() as $column) {
            $activeSheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'center' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $activeSheet->getStyle('A1:E1')->applyFromArray($styleArray);

          
        $sqlforNoAccount = "SELECT date, description, inflows, outflows, balance FROM tblcashbookentry WHERE ((MONTH(date) = '$Months[$r]' AND YEAR(date)= '$Year') AND (business_name = '$BusinessName')) Order By date, order_by ASC";
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();

        $i = 2;
        while ($row = $result->fetch_assoc()) {
                $activeSheet->setCellValue('A'.$i , $row['date']);
                $activeSheet->setCellValue('B'.$i , $row['description']);
                $activeSheet->setCellValue('C'.$i , $row['inflows']);
                $activeSheet->setCellValue('D'.$i , $row['outflows']);
                $activeSheet->setCellValue('E'.$i , $row['balance']);
                $i++;
            }
        


            $spreadsheet->createSheet();
        }
          
        $spreadsheet->setActiveSheetIndex(0);
          
        $filename = $BusinessName .'-Cashbook Entry Records-' . $MonthDetails[$Months[0]].'-to-'.$MonthDetails[$Months[2]].'-'.$Year.'.xlsx';

          
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='. $filename);
        header('Cache-Control: max-age=0');
        $Excel_writer->save('php://output');


       

    }else{
        
    }




}


if(isset($_POST['generate-yearly'])){

    
   
    $WhatWillGenerate = $_POST['whatshouldIDOY'];
    $Year = $_POST['yearY'];
    $BusinessName = mysqli_real_escape_string($conn,   $_SESSION ['business_name']);
    $BusinessOwner = mysqli_real_escape_string($conn,   $_SESSION ['business_owner']);


    $Months = array('',
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7 ',
    '8',
    '9',
    '10',
    '11',
    '12',);

    $MonthDetails = array('',
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July ',
    'August',
    'September',
    'October',
    'November',
    'December',);




    


    if($WhatWillGenerate == "Income Statement"){

      

    }
    else if($WhatWillGenerate == "Cash Flow"){

        

    }
    else if($WhatWillGenerate == "Print"){

       

        $fileName = $BusinessName .'-Cashbook Entry Records Year-of-'.$Year.'.pdf';


                
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('../img/logo.png',100,6,170);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Move to the right
    
    $this->Ln(10);
    // Title
    $this->Cell(100);
    $this->Cell(10,10,'CASHBOOK ENTRY RECORDS',0,0,'C');
    $this->Ln(7);
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

// Page footer
function headerTable()
{
  
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Page number
    $this->Cell(5);
    $this->Cell(20,10,'Date',1,0,'C');
    $this->Cell(80,10,'Description',1,0,'C');
    $this->Cell(30,10,'Inflows',1,0,'C');
    $this->Cell(30,10,'Outflows',1,0,'C');
    $this->Cell(30,10,'Balance',1,0,'C');
    $this->Ln();
}
function queryTable($Month, $Year, $BusinessName,$conn){
        $this->SetFont('Arial','B',10);
       
      
        $sqlforNoAccount = "SELECT date, description, inflows, outflows, balance FROM tblcashbookentry WHERE ((MONTH(date) = '$Month' AND YEAR(date)= '$Year') AND (business_name = '$BusinessName')) Order By date, order_by ASC";
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
                $this->Cell(5);
                $this->Cell(20,10,$row['date'],1,0,'L');
                $this->Cell(80,10,$row['description'],1,0,'L');
                $this->Cell(30,10,$row['inflows'],1,0,'C');
                $this->Cell(30,10,$row['outflows'],1,0,'C');
                $this->Cell(30,10,$row['balance'],1,0,'C');
                $this->Ln();
        }
}

function Signatory($BusinessOwner, $BusinessName)
{
    $this->Ln(8);
    $this->SetFont('Arial','B',12);
    $this->Cell(15);
    $this->Cell(30,10,$BusinessOwner,0,0,'C');
    $this->Ln(6);
    $this->Cell(15);
    $this->SetFont('Arial','B',12);
    $this->Cell(30,10,$BusinessName .', Owner',0,0,'C');
    // Line break
    $this->Ln(20);
}


function Month($MonthDetails, $Year)
{
    $this->Ln(8);
    $this->SetFont('Arial','B',12);
    $this->Cell(15);
    $this->Cell(30,10,'Month of '.$MonthDetails . ' ' . $Year,0,0,'C');
    // Line break
    $this->Ln(10);
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Legal',0);

for ($i=1; $i <=12 ; $i++) { 
    # code...
    $pdf->Month($MonthDetails[$i], $Year);
    $pdf->headerTable();
    $pdf->queryTable($Months[$i], $Year, $BusinessName,$conn);
}

$pdf->Signatory($BusinessOwner, $BusinessName);
$pdf->Output($fileName, 'D');
      
        



     


    }
    else if($WhatWillGenerate == "Download"){


        
        $spreadsheet = new Spreadsheet();
        $Excel_writer = new Xlsx($spreadsheet);


        $spreadsheet->getProperties()->setCreator($BusinessOwner)
        ->setLastModifiedBy($BusinessOwner)
        ->setTitle($BusinessName.'-Cashbook Entry Report Year-of-'.$Year )
        ->setSubject('Cashbook Entry Report')
        ->setDescription('Cashbook Entry Report')
        ->setKeywords('Cashbook Entry Report')
        ->setCategory('Cashbook Entry Report');

        for ($r=0; $r <= 11 ; $r++) { 
            # code...
        $m = $r + 1;
        $spreadsheet->setActiveSheetIndex($r);
        $activeSheet = $spreadsheet->getActiveSheet();
          
        $activeSheet->setCellValue('A1', 'Date');
        $activeSheet->setCellValue('B1', 'Description');
        $activeSheet->setCellValue('C1', 'Inflows');
        $activeSheet->setCellValue('D1', 'Ouflows');
        $activeSheet->setCellValue('E1', 'Balance');

        $activeSheet->setTitle($MonthDetails[$m]);

        foreach ($activeSheet->getColumnIterator() as $column) {
            $activeSheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'center' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $activeSheet->getStyle('A1:E1')->applyFromArray($styleArray);

          
        $sqlforNoAccount = "SELECT date, description, inflows, outflows, balance FROM tblcashbookentry WHERE ((MONTH(date) = '$Months[$m]' AND YEAR(date)= '$Year') AND (business_name = '$BusinessName')) Order By date, order_by ASC";
        $stmt = $conn->prepare($sqlforNoAccount);
        $stmt->execute();
        $result = $stmt->get_result();

        $i = 2;
        while ($row = $result->fetch_assoc()) {
                $activeSheet->setCellValue('A'.$i , $row['date']);
                $activeSheet->setCellValue('B'.$i , $row['description']);
                $activeSheet->setCellValue('C'.$i , $row['inflows']);
                $activeSheet->setCellValue('D'.$i , $row['outflows']);
                $activeSheet->setCellValue('E'.$i , $row['balance']);
                $i++;
            }
        


            $spreadsheet->createSheet();
        }
          
        $spreadsheet->setActiveSheetIndex(0);
          
        $filename = $BusinessName .'-Cashbook Entry Records Year-of-'.$Year.'.xlsx';

          
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='. $filename);
        header('Cache-Control: max-age=0');
        $Excel_writer->save('php://output');


      

    }else{
        header("Location: ../SEA/cashbook.php");
        $_SESSION ['year'] = date("Y");
        $_SESSION ['month']= date("m");
    }




}