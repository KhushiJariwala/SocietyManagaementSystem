<?php
require("db.php");

$sql = "SELECT *  FROM event ORDER BY id ASC" ;
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
    <title>Events</title>

    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
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
    </style>
</head>
<body>
    <h1 style="text-align: center;">Events</h1>

    <div class="row">

        <?php if($data){ ?>
            <?php $i = 1; foreach ($data as $key => $value) { ?>
                <div class="column">
                  <div class="card">
                    <img src="<?= $base_url ?>upload/<?= $value['image'] ?>" alt="Milkman" style="width:100%">
                    <h3><?= $value['name'] ?></h3>
                  </div>
                </div>
            <?php } ?>
        <?php } ?>
      
    </div>

    
    
    

</body>
</html>