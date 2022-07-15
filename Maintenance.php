<?php
require("db.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance</title>

    <style>
        * {
            box-sizing: border-box;
            text-decoration: none;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            background: linear-gradient(135deg, #afdcec, #6698ff);
        }
        .container {
            max-width: 700px;
            position: relative;
            margin: 0 auto;
            flex: 50%;
            padding: 5px;
        }
        .container img {
            vertical-align: middle;
        }
        .container .content {
            bottom: 0;
            position: absolute;
            width: 100%;
            color: #f1f1f1;
            padding: 20px;
        }
        .row {
            display: flex;
        }
        h1 a.hover{
            background-color: black;
        }
        img{
            border-radius: 10px 10px 10px 10px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Maintenance</h1>

    <div class="row">
        <div class="container">
            <img src="Images/11.jpg" alt="Payment History" style="width:100%;">
            <div class="content">
                <a href="PaymentHistory.php"> <h1 style="color: black;">Payment History</h1> </a>
            </div>
        </div>
        <div class="container">
            <img src="Images/12.jpg" alt="Society Passbook" style="width:100%;">
            <div class="content">
                <a href="SocietyPassbook.php"> <h1 style="color: white;">Society Passbook</h1> </a>
            </div>
        </div>
    </div>

</body>
</html>