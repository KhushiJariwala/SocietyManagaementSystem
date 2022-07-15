<?php
require("db.php");

$sql = "SELECT *  FROM serviceprovider ORDER BY id ASC" ;
$data = array(); 
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Providers Info</title>

    <style>
        *{
            box-sizing: border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #afdcec, #6698ff);
        }
        .column {
            width: 25%;
            float: left;
            padding: 0 10px;
        }
        .row {
            margin: 0 -5px;
        }
        .row:after {
            display: table;
            content: "";
            clear: both;
        }
        @media screen and (max-width: 600px) {
            .column {
                display: block;
                width: 100%;
                margin-bottom: 20px;
            }
        }
        .card {
            padding: 16px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            background-color: #f1f1f1;
            text-align: center;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.5);
        }
        .card {
            border-radius: 5px 5px 0 0;
        }
        img {
            border-radius: 5px;
        }
        .popup {
          display: inline-block;
          position: relative;
          cursor: pointer;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }
        .popup .popuptext {
          visibility: hidden;
          width: 160px;
          background-color: #555;
          color: #fff;
          text-align: center;
          border-radius: 6px;
          padding: 8px 0;
          position: absolute;
          z-index: 2;
          bottom: 125%;
          left: 50%;
          margin-left: -80px;
        }
        .popup .popuptext::after {
          content: "";
          position: absolute;
          top: 100%;
          left: 50%;
          margin-left: -5px;
          border-width: 5px;
          border-style: solid;
          border-color: #555 transparent transparent transparent;
        }
        .popup .show {
          visibility: visible;
          -webkit-animation: fadeIn 1s;
          animation: fadeIn 1s;
        }
        @-webkit-keyframes fadeIn {
          from {opacity: 0;} 
          to {opacity: 1;}
        }
        @keyframes fadeIn {
          from {opacity: 0;}
          to {opacity:1 ;}
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Service Providers Info</h1>
    <br>
    <div class="row">

        <?php if($data){ ?>
            <?php $i = 1; foreach ($data as $key => $value) { ?>
                <div class="column">
                  <div class="card">
                    <img class="popup" onclick="myFunction1()" src="<?= $base_url ?>upload/<?= $value['image'] ?>" alt="<?= $value['name'] ?>" style="width:100%">
                    <span class="popuptext" id="myPopup"> </span>
                    <h3><?= $value['name'] ?></h3>
                  </div>
                </div>
            <?php } ?>
        <?php } ?>
      
    </div>

      <script>
        function myFunction1() {
          var popup = document.getElementById("myPopup");
          popup.classList.toggle("show");
        }
      </script>

</body>
</html>