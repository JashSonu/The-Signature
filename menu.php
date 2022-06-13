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

 $n = $_SESSION["name"];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/menu.css" />
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
        <link rel="icon" href="./Images/sitelogo.png" type="image/icon type">

        <title>Menu</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{
    margin:0;
    padding:0;
    }
    body{
        font-family: 'Archivo', sans-serif;
        background-color: #000;
        overflow-x: hidden;
    }
    header{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    header a{
        text-decoration: none;
    }
    .container{
        display: block;
        box-sizing: border-box;
        max-width: 1440px;
        width:90%;
        padding:2.8em 6.8em 2.1em;
        color:#fff;
        position: relative;
        z-index: 10;
    }
    .active,.active1{
        color:#babbbf;
    }
    .active::after{
        content: "";
        position: absolute;
        top:25px;
        right:12px;
        width:20px;
        height:2px;
        background-color: #babbbf;
        /* transform: translateX(-50%); */
    }
    .active1::after{
        content: "";
        position: absolute;
        top:25px;
        right:18px;
        width:20px;
        height:2px;
        background-color: #babbbf;
        /* transform: translateX(-50%); */
    }
    .logo{
        margin-top: 1em;
        /* margin-left: 1.5em; */
        font-size: 1.1em;
        color:#ffbe00;
    }
    .menu{
        margin-right: -6em;
    }
    ul{
        margin-top: 1em;
        margin-right: 8em;
        display: flex;
        width:60%;
        justify-content: center;
        align-items: center;
        list-style: none;
    }
    li{
        position: relative;
        font-size: 1.1em;
        color:#ffbe00;
        margin-left: 2.5em;
        
    }
    .active2{
        color:#babbbf;
    }
    .active2::after{
        content: "";
        position: absolute;
        top:25px;
        right:12px;
        width:20px;
        height:2px;
        background-color: #babbbf;
        /* transform: translateX(-50%); */
    }
    .search_nav{
        margin-top: 1em;
        /* margin-right: 3em; */
        display: flex;
        justify-content: flex-end;
    }
    .icon{
        margin-right:-4em;
    }
    .fa::before{
        font-size: 1.2em;
        margin-left: 30px;
        color: #ffbe00;
    }
    .icon i::before{
        color: #ffbe00;
    }
    .social{
        position: fixed;
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
    }
    .social i{
        padding:0.6em 0;
    }
    .social .fa::before{
        color:black;
        margin-left: 0.3em;
        font-size: 1.6rem;
    }
    .head h3{
        position: relative;
        text-align: center;
        color: #ffbe00;
        font-family: 'Oswald', sans-serif;
        font-size: 1.5rem;
    }
    .head img{
        position: relative;
        left: 48%;
    }
    .head p{
        position: relative;
        text-align: center;
        font-size: 1.2rem;
        color: white;
        font-family: 'Satisfy', cursive;
    }
    .menugap {
        margin-left: 5em;
        width:90%;
        position: relative;
        height: 610px;
        margin-bottom: 5em;
    }
    .smpizza {
        position: absolute; 
        top: 0%;
        left: 2%;
        width: 44%;
    }
    .smsoup{
        position: absolute; 
        top: 0%;
        left: 34.5%;
        width: 44%; 
    }
    .smkabab{
        position: absolute; 
        top: 0%;
        left: 67%;
        width: 44%;
    }
    .smbbq{
        position: absolute; 
        top: 34%;
        left: 2%;
        width: 44%;
    }
    .smburger{
        position: absolute;
        top: 33.5%;
        left: 34.5%;
        width: 44%;
    }
    .smsub{
        position: absolute;
        top: 67%;
        left: 67%;
        width: 44%;
    }
    .smpasta{
        position: absolute;
        top: 67%;
        left: 34.5%;
        width: 44%;
    }
    .menuimg{
        box-shadow: 0px 5px 5px 0px rgba(243, 196, 43, 0.918);
        border-radius: 0px 0px 0px 0px;
        opacity: 0.6;
        transition: transform .2s;
        width: 70%;
    }
    .menuimg:hover {
        cursor: pointer;
        -ms-transform: scale(1.5); /* IE 9 */
        -webkit-transform: scale(1.5); /* Safari 3-8 */
        transform: scale(1.2); 
    }
    .menu-info{
        position: absolute;
        left: 1.5%;
        top: 15%; 
    }
    .title,.title1 {
        font-family: 'Oswald', sans-serif;
        color:rgba(243, 196, 43, 0.918);
        font-size: 2.8rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-top: 1em;
    }
    .title1{
        margin-top: 4.8em;
    }
    .subtitle {
        position: absolute;
        font-family: 'Oswald', sans-serif;
        color: rgba(243, 196, 43, 0.918);
        font-size: 1rem;
        margin-top: 0.01em;
        font-weight: 700;
    }
    .modal {
        display: none; 
        position: fixed; 
        z-index: 10; 
        padding-top: 90px; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.8);
    }
    .modal-content1, .modal-content2, .modal-content3,
    .modal-content4, .modal-content5, .modal-content6,
    .modal-content7 {
        background-color: #fefefe;
        background-size: cover
        margin: auto;
        padding: 20px;
        border: 3.5px solid #242424;
        width: 55%;
        height: 70%;
        color: black;
    }
    /* .modal-content1{
        background-image: url(../Images/Menu/Pizza.png);
    }
    .modal-content2{
        background-image: url(../Images/Menu/Hot\ Drinks.png);
    }
    .modal-content3{
        background-image: url(../Images/Menu/Cold\ Drinks.png);
    }
    .modal-content4{
        background-image: url(../Images/Menu/Shakes.png);
    }
    .modal-content5{
        background-image: url(../Images/Menu/Burger.png);
    }
    .modal-content6{
        background-image: url(../Images/Menu/Desserts.png);
    }
    .modal-content7{
        background-image: url(../Images/Menu/Pasta.png);
    }
     */
    .close1, .close2, .close3, .close4, .close5, .close6, .close7 {
        color: white;
        display: block;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close1:hover, .close1:focus, .close2:hover, .close2:focus,
    .close3:hover, .close3:focus, .close4:hover, .close4:focus,
    .close5:hover, .close5:focus, .close6:hover, .close6:focus,
    .close7:hover, .close7:focus {
        color: #ffbe00;
        text-decoration: none;
        cursor: pointer;
    }
    .modal-content {
        background-color: black;
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
    #table{
        cursor: pointer;
    }
    #booknowtab{
        cursor: pointer;
        position: relative;
        margin-top: 5px;
        left: 80%;
        background-color: #ffbe00;
        padding: 15px 30px;
        color: #000;
        border-radius: 30px;
        text-decoration: none;
        border-color: black;
    }
    .head span{
        position: relative;
        text-align: center;
        margin-top: 0.2em;
        font-family: 'Oswald', sans-serif;
        color:#fff;
        font-size: 4rem;
        font-weight: 500;
        left:44%;
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
        left: -120%;
        background-color: #222222;
        width: 280px;
        height: 140px;
        box-shadow: 0px 12px 24px 0px rgba(0,0,0,0.8);
        z-index: 1;
        }

        .dropdown-content h3 {
        color: #ffbe00;
        margin-top: 1em;
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
    <body>
        <div class="social">
        <a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a target="_blank" href="https://wa.me/+919672433032"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        </div>
        <div class="container">
            <header>
            <div class="logo"><a href="home.php"><img style="width:150px;height:63px;" src="./Images/logo.png" alt=""></a></div>
                <ul class="menu">
                    <a href="home.php"><li>Home</li></a>
                    <a href="aboutus.php"><li>About</li></a>
                    <a href="menu.php"><li class="active2">Menu</li></a>
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
                        <h3>Name :</h3> <text><?php echo $row["Name"];?></text><br>
                        <h3>Email :</h3> <text><?php echo $row["Email"];?></text><br>
                        <h3>Phone No :</h3> <text><?php echo $row["Ph_no"];?></text><br>
                        <?php } ?>
                    </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="head">
            <span>Hungry?</span>
            <h3>OUR MENU</h3>
            <img src="./Images/dishicon.png">
            <p>Look at our beautiful menu and refresh yourself with the best food. </p>
            <p>Start your day with a yummy mood !</p>
        </div>
        
<br>
<br>
        <!--MENU GRID START-->
        <div class="menugap">
            <!--//ITEM1-->
                <div class="smpizza" id="Pizza">
                    <img class="menuimg" src="./Images/pizza1.jpg" alt="Menu Item">
                        <div class="menu-info">
                            <h3 class="title">Pizza</h3>
                            <h5 class="subtitle">Italian Food</h5>
                        </div>
                </div>
            <!--//ITEM2-->
                <div class="smsoup" id="Soup">  
                    <img style="height:183px;" class="menuimg" src="./Images/hotdrinks.jpg" alt="Menu Item">
                        <div class="menu-info">
                            <h3 class="title">Hot Drinks</h3>
                            <h5 class="subtitle">Indian Food</h5>
                        </div>
                </div>
            <!--//ITEM3-->
                <div class="smkabab" id="Kabab">
                        <img style="height:380px;" class="menuimg" src="./Images/colddrinks.jpg" alt="Menu Item">
                        <div class="menu-info">
                            <h3 class="title title1">Cold Drinks</h3>
                            <h5 class="subtitle">Indian Food</h5>
                        </div>
                </div>
            <!--//ITEM4-->
                <div class="smbbq" id="BBQ">  
                    <img style="height:380px;" class="menuimg" src="./Images/shakes1.jpg" alt="Menu Item">
                        <div class="menu-info">
                            <h3 class="title title1">Shakes</h3>
                            <h5 class="subtitle">American Food</h5>
                        </div>
                </div>
            <!--//ITEM5-->
                <div class="smburger" id="Burger">
                        <img class="menuimg" src="./Images/burger.jpg" alt="Menu Item">
                        <div class="menu-info">
                            <h3 class="title">Burger</h3>
                            <h5 class="subtitle">American Food</h5>
                        </div>
                </div>
            <!--//ITEM6-->
                <div class="smsub" id="Subs">
                    <img style="height:183px;" class="menuimg" src="./Images/desserts.jpg" alt="Menu Item">
                        <div class="menu-info">
                            <h3 class="title">Desserts</h3>
                            <h5 class="subtitle">Indian Food</h5>
                        </div>
                </div>
            <!--//ITEM7-->
                <div class="smpasta" id="Pasta">
                    <img class="menuimg" src="./Images/pasta.png" alt="Menu Item">
                        <div class="menu-info">
                            <h3 class="title">Pasta</h3>
                            <h5 class="subtitle">Italian Food</h5>
                        </div>
                    </div>
            <!--Overlay For Pizza-->
            <div id="myModal1" class="modal">
                <div class="modal-content1">
                    <!-- <img style="width:700px;height:550px;"src="./Images/Menu/Pizza.png" alt=""> -->
                    <span class="close1">&times;</span> 
                </div>
            </div>
            <!--Overlay For Hot Drink-->
            <div id="myModal2" class="modal">
                <div class="modal-content2">
                    <span class="close2">&times;</span> 
                </div>
            </div>
            <!--Overlay For Cold Drink-->
            <div id="myModal3" class="modal">
                <div class="modal-content3">
                    <span class="close3">&times;</span> 
                </div>
            </div>
            <!--Overlay For Shakes-->
            <div id="myModal4" class="modal">
                <div class="modal-content4">
                    <span class="close4">&times;</span> 
                </div>
            </div>
            <!--Overlay For Burger-->
            <div id="myModal5" class="modal">
                <div class="modal-content5">
                    <span class="close5">&times;</span> 
                </div>
            </div>
            <!--Overlay For Dessert-->
            <div id="myModal6" class="modal">
                <div class="modal-content6">
                    <span class="close6">&times;</span> 
                </div>
            </div>
            <!--Overlay For Pasta-->
            <div id="myModal7" class="modal">
                <div class="modal-content7">
                    <span class="close7">&times;</span> 
                </div>
            </div>
        </div>
        <!--MENU GRID END-->
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
</html>