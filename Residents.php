<?php
require("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $sql = "INSERT INTO `residents` (`user_id`, `fullname`, `cnumber`, `fi`, `vi`, `pro`, `oi`, `date_added`) VALUES ('".(isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "0")."','".$_POST['fullname']."','".$_POST['cnumber']."','".$_POST['fi']."','".$_POST['vi']."','".$_POST['pro']."','".$_POST['oi']."','".date("Y-m-d H:i:s")."')";
    $mysqli->query($sql);
    $_SESSION['success'] = "Resident Detail Submit Successfully.";

    header("location:".$base_url."Residents.php");die;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        body{
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #afdcec, #6698ff);
            padding: 10px;
        }
        .container{
            width: 100%;
            max-width: 700px;
            padding: 25px 30px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
            border-radius: 5px;
        }
        .container .title{
            font-weight: 500;
            font-size: 25px;
            position: relative;
        }
        .container .title::before{
            position: absolute;
            content: "";
            bottom: 0;
            left: 0;
            width: 30px;
            height: 3px;
            background: linear-gradient(135deg, #afdcec, #6698ff);
            border-radius: 5px;
        }
        .content form .user-details{
            flex-wrap: wrap;
            display: flex;
            margin: 20px 0 12px 0;
            justify-content: space-between;
        }
        form .user-details .input-box{
            width: calc(100% / 2 - 20px);
            margin-bottom: 15px;
        }
        form .input-box span.details{
            font-weight: 500;
            display: block;
            margin-bottom: 5px;
        }
        .user-details .input-box input{
            width: 100%;
            height: 45px;
            font-size: 16px;
            outline: none;
            padding-left: 15px;
            border-radius: 5px;
            border-bottom-width: 2px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }
        .user-details .input-box input:focus,
        .user-details .input-box input:valid{
            border-color:  #6698ff;
        }
        form .category label{
            align-items: center;
            display: flex;
            cursor: pointer;
        }
        form .category label .dot{
            width: 18px;
            height: 18px;
            margin-right: 10px;
            border-radius: 50%;
            border: 5px solid transparent;
            background: #d9d9d9;
            transition: all 0.3s ease;
        }
        form .button{
            height: 45px;
            margin: 35px 0
        }
        form .button input{
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #afdcec, #6698ff);
        }
        form .button input:hover{
            background: linear-gradient(-135deg, #afdcec, #6698ff);
        }
        @media(max-width: 584px){
            .container{
                max-width: 100%;
            }
            form .user-details .input-box{
                width: 100%;
                margin-bottom: 15px;
            }
            form .category{
                width: 100%;
            }
            .content form .user-details{
                overflow-y: scroll;
                max-height: 300px;
            }
            .user-details::-webkit-scrollbar{
                width: 5px;
            }
        }
        @media(max-width: 459px){
            .container .content .category{
                flex-direction: column;
            }
        }
    </style>

    <script>
      function validate3()
      {
        if (document.form5.fullname.value.length == "")
        {
          alert("Please enter your Full Name.");
          return false;
        }

        var a = document.getElementById("pnumber").value;
        if (a == "")
        {
          alert("Enter your Phone Number");
          return false;
        }
        if (a < 0)
        {
          alert("Enter mobile number in positive integers only");
          return false;
        }
        if (isNaN(a))
        {
          alert("Enter only number for Phone Number");
          return false;
        }
        if (a.length != 10) 
        {
          alert("Enter 10 digits Phone Number");
          return false;
        }

        if (document.form5.fi.value.length == "")
        {
          alert("Please enter your Family Information.");
          return false;
        }

        if (document.form5.vi.value.length == "")
        {
          alert("Please enter your Vehicle & Vehicle no.");
          return false;
        }

        if (document.form5.pro.value.length == "")
        {
          alert("Please enter your Profession.");
          return false;
        }

        if (document.form5.oi.value.length == "")
        {
          alert("Please enter your Owner Information.");
          return false;
        }
          return true;

      }
    </script>

</head>
<body>
  <div class="container">
    <div class="title">Residential Information</div>

    <?php if(isset($_SESSION['success'])){ ?>
        <div style="color: #238201">Success : <?= $_SESSION['success'] ?></div>
    <?php unset($_SESSION['success']); }else if(isset($_SESSION['error'])){ ?>
        <div style="color: #ff0909">Success : <?= $_SESSION['error'] ?></div>
    <?php unset($_SESSION['error']); } ?>
    <div class="content">
      <form name="form5" onsubmit="if(!validate3()){return false;}" method="post" action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Family head Fullname</span>
            <input type="text" name="fullname" placeholder="Enter your Full Name">
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="cnumber" id="pnumber" placeholder="Enter your Number">
          </div>
          <div class="input-box">
            <span class="details">Family Information</span>
            <input type="text" name="fi" placeholder="Enter Family members">
          </div>
          <div class="input-box">
            <span class="details">Vehicle Information</span>
            <input type="text" name="vi" placeholder="Enter Vehicle & Vehicle no.">
          </div>
          <div class="input-box">
            <span class="details">Profession</span>
            <input type="text" name="pro" placeholder="Enter your Profession">
          </div>
          <div class="input-box">
            <span class="details">Owner Information</span>
            <input type="text" name="oi" placeholder="Enter Owner Information">
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
