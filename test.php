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
    include_once './includes/dbconnect.php';

    $Bname = 'Ralph PC Store';
    $year = '2021';
    $income = array();
    $expense = array();

    for ($i=1; $i < 13 ; $i++) {  
        # code...

        $query = "SELECT  SUM(amount) AS total_amount FROM `tblincomestatement` WHERE `date_month` = '$i' AND `date_year` = '$year' AND `business_name` = '$Bname' AND `category` = 'INCOME'";    
        $stmt = $conn->prepare($query);
        $stmt-> execute();
        $result = $stmt->get_result();  
    
        while ($row = $result->fetch_assoc()) {
            $income[$i] = $row['total_amount'];
        }

        print_r($income[$i] . '\n') ;

    }

?>
</body>
</html>