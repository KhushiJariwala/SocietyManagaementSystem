<?php
require("db.php");

$data = array(); 
if(isset($_SESSION['user_id'])){
    $sql = "SELECT *  FROM paymenthistory WHERE user_id = '".$_SESSION['user_id']."' ORDER BY id DESC" ;
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Society Meeting</title>

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
            max-width: 600px;
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
            margin: 20px 0 12px 0;
        }
        form .user-details .input-box{
            width: 100%;
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
            margin-bottom: 15px;
            width: 100%;
        }
        .content form .user-details{
            max-height: 300px;
            overflow-y: scroll;
        }
        .user-details::-webkit-scrollbar{
            width: 5px;
        }
        }
        @media(max-width: 459px){
        .container .content{
            flex-direction: column;
        }
        }


        .table{
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }
        .table,.table th,.table td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 8px 5px;
        }
        @media screen and (max-width:600px){
            .table
            {
                border: none;
                width: 500px;
                margin-left: 20px;
            }
            .table th{
                display: none;
            }
            .table tr td{
                display: block;
                float: right;
                width: 100%;
            }
            .table td::before
            {
                content: attr(aria-describedby);
                float: left;
                margin-right: 20px;
            }
        }
        .max90{
            max-width: 90%
        }
    </style>

    <script>
        function validate4()
        {
            if (document.form3.email.value.length == "") 
            {
                alert("Please enter your Email.");
                return false;
            }
                var myform = document.form3;
                var chkMail = myform.email.value;
    
                var emailPattern = "^[\\w-_\.]*[\\w-_\.]\@[\\w]\.+[\\w]+[\\w]$";
                var regex = new RegExp(emailPattern);
                if (regex.test(chkMail)=false)
                {
                alert("Email is " + regex.test(chkMail));
                }
        }
    </script>

</head>
<body>
  <div class="container max90">
    <div class="title">Society Meeting</div>
    <?php if(isset($_SESSION['success'])){ ?>
        <div style="color: #238201">Success : <?= $_SESSION['success'] ?></div>
    <?php unset($_SESSION['success']); }else if(isset($_SESSION['error'])){ ?>
        <div style="color: #ff0909">Success : <?= $_SESSION['error'] ?></div>
    <?php unset($_SESSION['error']); } ?>
    <div class="content ">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Payment</th>
              <th scope="col">Note</th>
              <th scope="col">Date Payment</th>
            </tr>
          </thead>
          <tbody>
            <?php if($data){ ?>
                <?php $i = 1; foreach ($data as $key => $value) { ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $value['payment'] ?></td>
                        <td><?= $value['note'] ?></td>
                        <td><?= $value['date_payment'] ?></td>
                    </tr>
                <?php $i++; } ?>
            <?php }else{ ?>
                <tr>
                    <td align="center" colspan="4">
                        <?php if(isset($_SESSION['user_id'])){ ?>
                        Payment Not Found
                        <?php }else{ ?>
                            Login And View History
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>
  </div>

</body>
</html>