<?php
session_start();
function OpenCon()
{
    $dbhost = "localhost:3306";
    $dbuser = "root";
    $dbpass = "jashpatel1";
  $db = "contact";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

return $conn;
}

function CloseCon($conn)
{
$conn -> close();
}

$conn = OpenCon();
if($conn === false)
{
die("ERROR: Could not connect. " . $conn->connect_error);
}
$orid = $_SESSION["oid"];
$n = $_SESSION["name"];
if(isset($_POST["cancelorder"]))
{
    $sql1 = "DELETE FROM placed WHERE orderid='$orid'";
    $result1 = mysqli_query($conn,$sql1);
    $sql2 = "DELETE FROM full_details WHERE ordid='$orid'";
    $result2 = mysqli_query($conn,$sql2);
    if($result1 == true)
    {
        if($result2 == true)
        {
            echo '<script type="text/javascript">'; 
        echo 'alert("Order Cancelled");'; 
        echo 'window.location.href = "home.php";';
        echo '</script>';
        }
        
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/font.css">
    <link rel="stylesheet" href="CSS/font-awesome.min.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,
    100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;
    1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link
    href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@700&family=Open+Sans:wght@600&family=Montserrat:wght@600;800&family=Roboto&family=Ubuntu&display=swap"
    rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="./Images/sitelogo.png" type="image/icon type">

    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>End Screen</title>
    <style>
        body{
            max-width: 1640px;
            width:90%;
            margin:0 auto;
            font-family: 'Archivo', sans-serif;
            background-color: #000;
            width:100%;
            height:100%;
            overflow: auto;
        }
        .social{
            position: absolute;
            top:36%;
            right:0px;
            width: 45px;
            background-color: #fff;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 0.8em 0;
            border-bottom-left-radius: 15px;
            border-top-left-radius: 15px;
            box-shadow: -10px 10px 10px rgba(0, 0, 0, 0.8) ;
        }
        .social i{
            padding:0.6em 0;
        }
        .social .fa::before{
            margin-left: 0.3em;
            font-size: 1.6rem;
        }
        .container{
            display: block;
            box-sizing: border-box;
            max-width: 1440px;
            width:90%;
            padding:4em 6.8em 8.1em;
            color:#fff;
            position: relative;
            z-index: 10;
        }
        .container a{
            text-decoration: none;
        }
        header{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo{
            font-size: 1.1em;
            color:#ffbe00;
        }
        ul{
            margin-right: 8em;
            display: flex;
            width:60%;
            justify-content: center;
            align-items: center;
            list-style: none;
        }
        .menu{
            margin-right: -2em;
        }
        li{
            position: relative;
            font-size: 1.1em;
            color:#ffbe00;
            margin-left: 2.5em;
        }
        .search_nav{
            display: flex;
            justify-content: flex-end;
        }
        .fa::before{
            /* margin-left: 13em; */
            font-size: 1.2em;
            margin-left: 30px;
            color: #000;
        }
        .icon i::before{
            color: #ffbe00;
        }
        #table{
            cursor: pointer;
        }
        .modal {
            display: none; 
            position: fixed; 
            z-index: 10; 
            padding-top: 100px; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.8);
            /* top: 15%; */
        }
        .modal-content {
            background-color: black;
            /* background-image: url(Images/Menu/Pizza.png);
            background-size: cover; */
            border-radius: 15px;
            margin: auto;
            padding: 20px;
            border: 3.5px solid #242424;
            width: 55%;
            height: 74%;
            color: black;
        }
        .close {
            color: white;
            display: block;
            float: right;
            font-size: 30px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: #ffbe00;
            text-decoration: none;
            cursor: pointer;
        }
        .tabover{
            position: relative;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 85%;
        }
        .endscreen{
            position: absolute;
            left:32%;
            top:38%;
            width:500px;
            border:2px solid #222222;
            text-align: center;
            color:#ffbe00;
        }
        .fa-check-circle::before{
            color:#ffbe00;
            font-size: 2.7rem;
        }
        .cancel{
            font-family: 'Archivo', sans-serif;
            font-size: medium;
            background-color: #ffbe00;
            padding: 10px 30px;
            color:#000;
            border: 0px solid black;
            border-radius: 15px;
            text-decoration: none;
        }

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        font-family: 'Archivo', sans-serif;
        top: 140%;
        left: 10%;
        background-color: #222222;
        width: 280px;
        height: 140px;
        box-shadow: 0px 12px 24px 0px rgba(0,0,0,0.8);
        z-index: 1;
        }

        .dropdown-content h3 {
        color: #ffbe00;
        margin-top: 0.5em;
        margin-left: 1em;
        text-decoration: none;
        display: inline-block;
        }
        text{
            color: white;
            font-family: 'Archivo', sans-serif;
            font-weight: bold;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}
        @media (max-width:1340px){
    body{
        display:none;
    }
}
    </style>
</head>
<body class="abt">
    <div class="bg_img">
        <div class="social">
        <a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a target="_blank" href="https://wa.me/+919672433032"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="container">
        <header>
        <div class="logo"><a href="home.php"><img style="width:150px;height:63px;" src="./Images/logo.png" alt=""></a></div>
            <ul class="menu">
                <a href="home.php"><li>Home</li></a>
                <a href="aboutus.php"><li class="active">About</li></a>
                <a href="menu.php"><li>Menu</li></a>
                <a id="table"><li>Table Booking</li></a>
                <a href="order.php"><li>Order</li></a>
                <a href="contactpage.php"><li>Contact</li></a>
            </ul>
            <div class="icon search_nav">
            <a href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            <div class="dropdown">
                <a href=""><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                <div class="dropdown-content">
                    <?php 
                    $sql = "SELECT * FROM customer WHERE Name='$n'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) 
                    {
                    ?>
                    <h3>Name:</h3> <text><?php echo $row["Name"];?></text><br>
                    <h3>Email:</h3> <text><?php echo $row["Email"];?></text><br>
                    <h3>Phone No.:</h3> <text><?php echo $row["Ph_no"];?></text><br>
                    <?php } ?>
                </div>
                </div>
            </div>
        </header>
    </div>
    <br>
    <br>

    <div class="endscreen">
        <form action="http://localhost:8080/Project_24th March/endscreen.php" method="post">
            <h3>Thank You For Placing Your Order !!</h3>
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            <h3>Your Order ID : <?php echo $orid; ?></h3>
            <input class="cancel" type="submit" value="Cancel Order" name="cancelorder">
        </form>
        <br>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span> 
            <img src="./Images/tableoverlay.png" class="tabover">
            <a href="./contactpage.php"><button id="booknowtab">BOOK NOW</button></a>
        </div>
    </div>
    <script src="./JS/tableoverlay.js"></script>
    <script src="./JS/menuoverlay.js"></script>
</body>