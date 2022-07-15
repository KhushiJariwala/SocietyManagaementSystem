<?php
    require("db.php");
    if(!empty($_SESSION['user_id'])){
        header("location:Home.php");die;
    }
    $error = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['submit']) && $_POST['submit'] == "Log in"){
            $uname = isset($_POST['uname']) ? $_POST['uname'] : "";
            $pass = isset($_POST['pass']) ? $_POST['pass'] : "";

            $sql = "SELECT id  FROM user WHERE email = '".$uname."' AND pass = '".md5($pass)."'" ;
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['user_id'] = $row['id']; 
                    header("location:Home.php");die;
                }
            }else{
                $error = "Email or Password Incorrect";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

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
    </style>

    <script>
      function validate2()
      {

        if (document.form2.username.value.length == "")
        {
          alert("Please enter your Username.");
          return false;
        }

        if (document.form2.pass.value.length == "") 
        {
          alert("Please enter your Password.");
          return false;
        }
      }
    </script>

</head>
<body>

  <div class="container">
    <div class="title">Log in</div>
    <?php if($error){ ?>
      <p class="error_msg"><?= $error ?></p>
    <?php } ?>
    
    <div class="content">
      <form name="form2" onsubmit="if(!validate2()){return false;}" method="post" action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="uname" placeholder="Enter Email">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass" placeholder="Enter Password">
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Log in">
        </div>
        <div class="login">
          <a style="text-decoration: none; color: black;" href="SignUp.php">Create an Account?</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>