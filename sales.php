<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        //Datebase connection
        include_once("config.php");
        $conn = connection();

        //Get current year
        $year = date("Y");

        //Get total sales
        $query = "SELECT total_price FROM order1 WHERE year(order_date) = '$year'";
        $result = mysqli_query($conn,$query);
        $sub = 0;
        while($row = mysqli_fetch_array($result)){
            $subtotal = $row['total_price'];
            $sub += $subtotal;
        }
        //Calculate sales per month
        $month = "SELECT month(order_date) as 'mon', sum(total_price) as 'sum' FROM order1 WHERE year(order_date) = '$year' 
                GROUP BY month(order_date) ORDER BY month(order_date)";
        $result_month = mysqli_query($conn,$month);
        
        while($row_month = mysqli_fetch_array($result_month)){
            if ($row_month['mon'] == '1'){
                $Jan = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '2'){
                $Feb = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '3'){
                $Mar = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '4'){
                $Apr = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '5'){
                $May = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '6'){
                $Jun = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '7'){
                $Jul = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '8'){
                $Aug = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '9'){
                $Sep = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '10'){
                $Oct = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '11'){
                $Nov = round($row_month['sum']/$sub*100);
            } elseif ($row_month['mon'] == '12'){
                $Dec = round($row_month['sum']/$sub*100);
            }
        }
        $sale=0;
    ?>
</body>
</html>