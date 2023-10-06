<?php
    session_start();

    //Datebase connection
    include_once("config.php");
    $conn = connection();

    //Get best sales product id
    $maxsales_query = "SELECT `product_id` as 'best_sales_product' FROM `order_detail` GROUP BY `product_id` ORDER BY COUNT(product_id) desc LIMIT 1";
    $maxsales_result = mysqli_query($conn,$maxsales_query);
    $bestproduct_row = mysqli_fetch_array($maxsales_result);    
    $best_productid = $bestproduct_row['best_sales_product'];   

    //Get every best product detail
    $query = "SELECT * FROM `product` WHERE `product_id` = '$best_productid'";
    $result = mysqli_query($conn,$query);
    $toprow = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electron</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Electron | Admin Page</title>
        <link rel="stylesheet" href="./css/mainpage.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    </head>
    
    <body>
        <br>
        <div id="main">
            <div class="head">
                <h1 class="title_style">Admin Dashboard</h1>
                <div class="dropdown">
                <button class="dropbtn"><img src="img/744709.png" width="50px"></button>
                <div class="dropdown-content">
                    <a href="homepage.php"> Logout</a>
                </div>
            </div>
            </div>
    
            <a href="addproduct.php" class="col-div-3">
                <div class="box">
                    <p ><br/><span>Add New Product</span></p>
                    <i class="fa fa-users box-icon"></i>		
                </div>
            </a>

            <a href="modifyproduct.php" class="col-div-3">
                <div class="box">
                    <p><br/><span>Modify/View Product</span></p>
                    <i class="fa fa-shopping-bag box-icon"></i>
                </div>
            </a>
            
            <a href="delivery.php" class="col-div-3">
                <div class="box">
                    <p><br/><span>Update Delivery Status</span></p>
                    <i class="fa fa-cubes box-icon"></i>
                </div>
            </a>  
            
            <div class="clearfix"></div>
            <br/><br/>
            
            <div class="chart">
                <br><h1 style="margin-left: 15%; color:     ;">Total Sales of <?php echo date("Y"); ?></h1><br><br>
                <div class="numbers">
                    <li><span style="margin-left: 240%;">100%</span></li>
                    <li><span style="margin-left: 240%;">50%</span></li>
                    <li><span style="margin-left: 240%;">0%</span></li>
                </div>
                <div class="bars">
                    <?php include 'sales.php'; ?>
                    <li><div class="bar" data-percentage="<?php if(empty($Jan)){echo $sale;}else{echo $Jan;} ?>"></div><span>January</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Feb)){echo $sale;}else{echo $Feb;} ?>"></div><span>February</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Mar)){echo $sale;}else{echo $Mar;} ?>"></div><span>March</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Apr)){echo $sale;}else{echo $Apr;} ?>"></div><span>April</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($May)){echo $sale;}else{echo $May;} ?>"></div><span>May</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Jun)){echo $sale;}else{echo $Jun;} ?>"></div><span>June</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Jul)){echo $sale;}else{echo $Jul;} ?>"></div><span>July</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Aug)){echo $sale;}else{echo $Aug;} ?>"></div><span>August</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Sep)){echo $sale;}else{echo $Sep;} ?>"></div><span>September</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Oct)){echo $sale;}else{echo $Oct;} ?>"></div><span>October</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Nov)){echo $sale;}else{echo $Nov;} ?>"></div><span>November</span></li>
                    <li><div class="bar" data-percentage="<?php if(empty($Dec)){echo $sale;}else{echo $Dec;} ?>"></div><span>December</span></li>
                </div>
            </div>
        
            <div class="clearfix"></div>
            <br/><br/>
            <div class="col-div-8">
                <h1 style="margin-left: 12px; color: #6CA5C8;">Company Logo</h1><br>
                <div class="box-8">
                    <div class="content-box">
                        <img src="./Img/Electron_logo.png" alt="eletron" style="margin:80px 60px 50px 40px;">
                    </div>
                </div>
            </div>
            
            <div class="col-div-4">
                <h1 style="color: #6CA5C8;">Best Sales Product</h1><br>
                <div class="box-4">
                    <div class="content-box">
                        <img class="top_img" src="./productimg/<?php echo $toprow['product_image']; ?>" width="280" height="290px" alt="" style="float:left;">
                        <div class="proname"><?php echo $toprow['product_name']; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
                
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(function(){
          $('.bars li .bar').each(function(key, bar){
            var percentage = $(this).data('percentage');
            $(this).animate({
              'height' : percentage + '%'
            },1000);
          });
        });
    </script>
    
    </body>
</html>