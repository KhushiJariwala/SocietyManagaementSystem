<?php
    require("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Poppins',sans-serif;
        }
        .slider{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: radial-gradient(rgba(43, 55, 96, 1), rgba(11, 16, 35, 1));
            z-index: -1;
        }
        nav{
            display: grid;
            grid-template-columns: 10% 1fr 15%;
            min-height: 15vh;
            color: white;
            align-items: center;
        }
        .bar{
            padding-left: 10px;
        }
        .content{
            grid-column: 2/3;
        }
        .logo{
            justify-self: initial;
            padding-right: 10px;
        }
        ul {
            margin: 0;
            list-style-type: none;
            overflow: hidden;
            padding: 0;
        }
        li {
            float: left;
        }
        li a {
            color: white;
            display: block;
            padding: 14px 16px;
            text-align: center;
            text-decoration: none;
        }
        li a:hover {
            background-color: #111;
        }
        section{
            display: flex;
            height: 80vh;
            justify-items: center;
            align-items: center;
        }
        .hero{
            height: 100%;
            width: 100%;
            bottom: 0;
        }
        .hero img{
            width: 100%;
            height: 85vh;
            object-fit: cover;
        }
        .headline{
            position: absolute;
            top: 90%;
            left: 20%;
            font-size: 70px;
            transform: translate(-20%, -70%);
            color: white;
        }
        h4{
            color: white;
        }
        ul{
            position: relative;
        }
    </style>

</head>
<body>
    <header>
        <nav>
            <img class="bar" src="Images/bar.svg" alt="bar">
            <div class="content">
                <ul>
                    <li><a class="active" href="Updates.php">Updates</a></li>
                    <li><a href="Service.php">Service Providers Info</a></li>
                    <li><a href="Maintenance.php">Maintenance</a></li>
                    <li><a href="Residents.php">Residents</a></li>
                    <li><a href="Complaints.php">Complains</a></li>
                </ul>
            </div>
            <?php if(empty($_SESSION['user_id'])){ ?>
            <h3 class="logo"><a style="text-decoration: none; color: white;" href="SignUp.php">Sign Up</a>
            &nbsp;&nbsp;
            <a style="text-decoration: none; color: white;" href="Login.php">Log in</a></h3>
            
            <?php }else{ ?>
                <h3 class="logo"><a style="text-decoration: none; color: white;" href="?logout=1">Log Out</a></h3>
            <?php } ?>
        </nav>
    </header>
        <section>
            <div class="hero">
                <img class="img" style="opacity: 70%;" src="Images/modern-residential-building.jpg" alt="landscape">
                <h1 class="headline">Society Management System</h1>
            </div>
        </section>

    <div class="slider"></div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"></script>

    <script>
        const headline = document.querySelector(".headline");
        const img = document.querySelector(".img");

        const tl = new TimelineMax();

        tl.fromTo(
            img,
            1,
            { height: "0vh" },
            { height: "85vh", ease: Power2.easeInOut }
        );

        tl.fromTo(
            headline, 
            1, 
            { x: "-150%"}, 
            { x: "-20%", ease: Power2.easeInOut }
        );
    </script>

</body>
</html>