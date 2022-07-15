<?php
  require("db.php");
  if(!empty($_SESSION['user_id'])){
      header("location:Home.php");die;
  }
  //echo "<pre>";print_r($_SERVER);die;
  $error = "";
  $firstname = "";
  $lastname = "";
  $email = "";
  $pnumber = "";
  $role = "";
  $username = "";
  $pass = "";
  $cpass = "";
  $gender = "";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit']) && $_POST['submit'] == "Sign Up"){
      $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
      $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
      $email = isset($_POST['email']) ? $_POST['email'] : "";
      $pnumber = isset($_POST['pnumber']) ? $_POST['pnumber'] : "";
      $role = isset($_POST['role']) ? $_POST['role'] : "";
      $username = isset($_POST['username']) ? $_POST['username'] : "";
      $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
      $cpass = isset($_POST['cpass']) ? $_POST['cpass'] : "";
      $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

      $sql = "SELECT id  FROM user WHERE email = '".$email."'";
      $result = $mysqli->query($sql);
      if ($result->num_rows > 0) {
        $error = "Email Already Registered.";
      }else{
        $sql = "INSERT INTO `user` (`fname`,`lname`,`email`,`phone`,`role`,`uname`,`pass`,`gender`,`date_added`) VALUES ('".$firstname."','".$lastname."','".$email."','".$pnumber."','".$role."','".$username."','".md5($pass)."','".$gender."','".date("Y-m-d H:i:s")."')";
        $result = $mysqli->query($sql);
        $_SESSION['success'] = "Sign Up Successfully.";
        header("Refresh:0");die;
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
        form .gender-details .gender-title{
            font-weight: 500;
            font-size: 20px;
        }
        form .category{
            width: 80%;
            display: flex;
            justify-content: space-between;
            margin: 14px 0 ;
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
        #dot-1:checked ~ .category label .one,
        #dot-2:checked ~ .category label .two,
        #dot-3:checked ~ .category label .three{
            border-color: #d9d9d9;
            background: #6698ff;
        }
        form input[type="radio"]{
            display: none;
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
        form .category{
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
        .container .content .category{
            flex-direction: column;
        }
        }
    </style>

    <script>
      function validate()
      {
        //console.log(111)
        if (document.form1.firstname.value.length == "")
        {
          alert("Please enter your First Name.");
          return false;
        }

        if (document.form1.lastname.value.length == "")
        {
          alert("Please enter your Last Name.");
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

        if (document.form1.role.value.length == "")
        {
          alert("Please enter your Role.");
          return false;
        }

        if (document.form1.username.value.length == "")
        {
          alert("Please enter your Username.");
          return false;
        }
        
        if (document.form1.pass.value.length == "") 
        {
          alert("Please enter your Password.");
          return false;
        }
        if (document.form1.pass.value.length < 8)
        {
          alert("Password should be of 8 characters.");
          return false;
        }
        if (document.form1.pass.value.length > 45)
        {
          alert("Password should be smaller to 45 characters.");
          return false;
        }
        if (document.form1.pass.value.length != document.form1.cpass.value.length)
        {
          alert("Confirm Password is not match with your Password.");
          return false;
        }
        
        if (document.form1.email.value.length == "") 
        {
          alert("Please enter your Email.");
          return false;
        }

        var b = document.form1.gender;
        for(i=0;i<b.length;i++)
        {
          if(b[i].checked==true)
          return true;
        }
        alert("Please select Gender.");
        return false;

          var myform = document.form1;
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
  <div class="container">
    <div class="title">Sign Up</div>
    <?php if($error){ ?>
      <p class="error_msg"><?= $error ?></p>
    <?php } ?>
    <?php if(!empty($_SESSION['success'])){ ?>
      <p class="success_msg"><?= $_SESSION['success'] ?></p>
    <?php unset($_SESSION['success']); } ?>
    <div class="content">
      <form name="form1" onsubmit="if(!validate()){return false;}" method="post" action="">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" value="<?= $firstname ?>" name="firstname" placeholder="Enter your First Name">
          </div>
          <div class="input-box">
            <span class="details">Last name</span>
            <input type="text" value="<?= $lastname ?>" name="lastname" placeholder="Enter your Last Name">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" value="<?= $email ?>" name="email" placeholder="Enter your Email">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" value="<?= $pnumber ?>" name="pnumber" id="pnumber" placeholder="Enter your Number">
          </div>
          <div class="input-box">
            <span class="details">Role</span>
            <input type="text" value="<?= $role ?>" name="role" placeholder="Enter your Role">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" value="<?= $username ?>" name="username" placeholder="Enter your Username">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass" placeholder="Enter your Password">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="cpass" placeholder="Confirm your Password">
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" <?= !$gender || $gender == "male" ? "checked" : "" ?> name="gender" value="male" id="dot-1">
          <input type="radio" <?= $gender == "female" ? "checked" : "" ?> name="gender" value="female" id="dot-2">
          <input type="radio" <?= $gender == "other" ? "checked" : "" ?> name="gender" value="other" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Other</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Sign Up">
        </div>
        <div class="login">
            Already have an Account? <a style="text-decoration: none; color: black;" href="Login.php">Log in</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
