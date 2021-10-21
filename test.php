<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            
        $sqlforNoAccount = "SELECT date, description, inflows, outflows, balance FROM tblcashbookentry WHERE ((MONTH(date) = '$Month' AND YEAR(date)= '$Year') AND (business_name = '$BusinessName')) Order By date, order_by ASC";
        $setRec = mysqli_query($conn, $sqlforNoAccount);


        $fileName = $BusinessName .'-Cashbook Entry Records-' . $MonthDetails[$Month].$Year.'.xlsx';


        $columnHeader = '';  
        $columnHeader = "Date" . "\t" . "Description" . "\t" . "Inflows" . "\t". "Outflows" . "\t". "Balance" . "\t";  
  
        $setData = '';  

        while ($rec = mysqli_fetch_row($setRec)) {  
            $rowData = '';  
            foreach ($rec as $value) {  
                $value = '"' . $value . '"' . "\t";  
                $rowData .= $value;  
            }  
            $setData .= trim($rowData) . "\n";  
        }  

        header("Content-type: application/octet-stream");  
        header("Content-Disposition: attachment; filename=".$fileName);  
        header("Pragma: no-cache");  
        header("Expires: 0");  
  
        echo ucwords($columnHeader) . "\n" . $setData . "\n"; 







?>
</body>
</html>