<?php
session_start();
function OpenCon()
{
  $dbhost = "localhost";
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
    <link rel="stylesheet" href="CSS/style.css">
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
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Home</title>
    <link rel="icon" href="./Images/sitelogo.png" type="image/icon type">

    <style>
        *{
    margin:0;
    padding:0;
    }
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
    .abt{
        overflow: auto;
    }
    img{
        width:70vh;
        display: block;
    }
    .bg_img{
        position: fixed;
        right:0;
        top:0;
        height:100%;
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
    .search_nav{
        display: flex;
        justify-content: flex-end;
        margin-left: 1em;
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
    .content_container{
        display: flex;
        justify-content: space-between;
        margin-top: 4.5em;
        width:100%;
        align-items: center;
        height:calc(100vh - 330px);
    }
    .dish_img{
        border-radius: 50%;
        padding:0.1em;
        border:3px solid #fff;  
        position: absolute;
        top:17%;
        right:0;
    }
    .content h3{
        font-size:2em;
        font-weight: 400;
        font-style: italic;
    }
    .content h1{
        font-size: 5em;
        font-weight: 500;
        margin-left: -0.1em;
    }
    .content p{
        font-size: 1.2em;
        color:#ffbe00;
        font-style: italic;
    }
    .checkout{
        border-radius: 25px;
        padding:1em;
        display: inline-block;
        border: 1px solid #fff;
        margin-top: 1em;
    }
    .food{
        position:absolute;
        bottom:50px;
        left:110px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width:60%;
        padding:0 4em;
        box-sizing: border-box;
    }
    .item{
        width:50%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .item_img{
        position: relative;
        width:110px;
    }
    .item_img::before{
        content: "";
        width: 120%;
        height: 80px;
        background-color: #babbbf;
        position: absolute;
        left:50%;
        top:50%;
        transform: translate(-50%, -50%);
        z-index: 2;
    }
    .item_img img{
        z-index: 5;
        position: relative;
        width:15vh;
    }
    .item_content{
        margin-left: 1.8em;
        width:calc(90% - 90px);
    }
    .item_content h3{
        margin-bottom: 0.5em;
        font-size: 1em;
        color:#fff;
    }
    .shift{
        margin-left: -1.5em;
    }
    .item_content .fa::before{
        font-size: 0.6em;
        color:#fff;
        margin-right: 1.4em;
    }
    .item_content p{
        font-size: 0.8rem;
        margin-left: 2.2em;
        color: #fff;
    }
    .nav{   
        position: absolute;
        width:16px;
        height:100%;
        background-color:#ffbe00;
        color:#000;
        left:0;
        display: flex;
        justify-content: center;
        align-self:center;
    }
    .nav .fa::before{
        position: absolute;
        left: -1em;
        bottom: 1.5em;
        color: #000;
        font-size: 1.6em;
    }
    .bottominfo{
        position:absolute;
        bottom: 0.7em;
        left:0;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
        width:100%;
    }
    .items{
        margin-bottom: 4em;
        margin-left: 55%;
        width:50%;
    }
    .items h3{
        font-size: 1rem;
        margin-bottom: 0.3em;
    }
    .box{
        font-size: 1.2em;
        width: 2.4em;
        height: 2.4em;
        font-weight:500;
        display: flex;
        justify-content: center;
        align-items: center;
        border:2px solid #000;
    }
    .items p{
        font-weight: 500;
        position: absolute;
        top:17%;
        right:3.8em;
        font-size: 0.8rem;
    }
    .items .fa::before{
        font-size: 0.6rem;
        color:#000;
        margin-right: 0.5em;
    }

    /* About Us & Contact Page */

    .about,.contact,.details{
        margin-top: -2em;
        margin-left: 10em;
        display: grid;
        grid-template-columns: 650px 350px;
        /* margin-bottom: 130px; */
        column-gap: 50px;
    }
    .direction{
        margin-top: -2em;
        margin-left: 10em;
        display: grid;
        grid-template-columns: 350px 650px;
        /* margin-bottom: 130px; */
        column-gap: 50px;
    }
    .contact_form{
        margin-top: -3em;
        height:400px;
        /* background-color: #242424; */
        width:500px;
        margin-left: -6em;
    }
    .about_desc h3,.tablebook_desc h3,.contact_form h3,.action h3,.details-map h3,.details_desc h3{
        position: relative;
        margin-top: 2em;
        color:#ffbe00;
        font-size:1.1em;
        font-weight: 600;
        /* font-style: italic; */
    }
    .details-map{
        margin-top: 5em;
    }
    .action h3,.details_desc h3{
        margin-left: -4em;
    }
    .details-map h3{
        margin-left: -2.6em;
    }
    .about_desc h3::before,.tablebook_desc h3,.contact_form h3::before,.action h3::before,.details-map h3::before,.details_desc h3::before{
        content: "";
        position: absolute;
        top:8px;
        left:70px;
        width:40px;
        height:2px;
        background-color: #ffbe00;
        /* transform: translateX(-50%); */
    }
    .action h3::before{
        left:310px;
    }
    .contact_form h3::before{
        left: 90px;
    }
    .details-map h3::before{
        left:95px;
    }
    .details_desc h3::before{
        left:150px;
    }
    .about_desc span,.contact_form span,.action span,.details-map span{
        display: inline-block;
        margin-top: 0.2em;
        font-family: 'Oswald', sans-serif;
        color:#fff;
        font-size: 4rem;
        font-weight: 500;
        margin-left: -0.1em;
    }
    .action span{
        margin-left:1.2em;
        text-align: left;
    }
    .contact_form span{
        margin-top: -0.3em;
        font-size: 3.5rem;
    }
    .details-map span{
        margin-left: -0.75em;
    }
    .abouttext,.contacttext{
        display: flex;
    }
    .abouttext p,.contacttext,.check{
        padding-right:1em;
        line-height: 22px;
    }
    .about_desc p, .team p,.contacttext,.action p,.details-map p{
        margin-top: 0.5em;
        font-size: 0.9rem;
        color: #b8b8b8;
    }
    .action p{
        margin-left: 1em;
    }
    .details-map p{
        margin-left: -3em;
    }
    .founder, .exp{
        display: flex;
    }
    .founder img{
        width:50%;
        height:75px;
        width:75px;
    }
    .founder h4{
        margin-left: 1.4em;
        margin-top: 0.3em;
        font-size: 1.2rem;
        font-weight: 600;
        font-family: 'Oswald', sans-serif;
        color:#fff;
    }
    .founder h5{
        margin-left: 1.7em;
        font-size: 1rem;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;
        color:#ffbe00;
    }
    .sign{
        margin-left: 6.5em;
    }
    .exp_25{
        position: relative;
        /* z-index: 5; */
        margin-right: 3em;
        margin-top: -1em;
        background-color: #242424;
        height:130px;
        padding: 0.8em;
        width:170px;
    }
    .exp_25::before{
        position: absolute;
        top:78px;
        left:-8px;
        width:85px;
        height:85px;
        z-index: -1;
        content: "";
        background:url('../Images/triangle.PNG');
    }
    .exp_25 h2,.team h2{
        /* display: inline-block; */
        color: #fff;
        margin-left: 0.3em;
        font-size: 4rem;
    }
    .exp_25 p{
        line-height: 22px;
        /* display: inline-block; */
        margin-left: 0em;
        text-align: center;
    }
    sub{
        font-size: 1.3rem;
        position: absolute;
        top:-53px;
        color: #ffbe00;
        margin-top: 5em;
    }
    .team{
        text-align: center;
    }
    .team p{
        font-size: 1rem;
        letter-spacing: 0.1em;
        margin-top:4em;
    }
    .team h2{
        margin-top: 0.2em;
    }
    .team img{
        margin-left: 45.5em;
        margin-top: 0.2em;
        width:60px;
        height:15px;
    }
    .members,.tablebook{
        margin-left: 2.3em;
        display: grid;
        grid-template-columns: 380px 380px 220px;
        column-gap: 50px;
        text-align: center;
    }
    .check{
        margin-top: 1.3em;
    }
    .check p{
        margin-left: -1em;
    }
    .bookseat p{
        margin-left: 0em;
        margin-top: -1em;
    }
    .check .noofguest{
        font-family: 'Oswald', sans-serif;
        border: none;
        font-size: 1.2rem;
        background-color: #000;
        color: #ffbe00;
        width:95px;
        height:30px;
        margin-left: -0.2em;
    }
    .guest{
        margin-left: -2.4em;
    }
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
    .checkin{
        font-family: 'Oswald', sans-serif;
        position: relative;
        margin-left: 4.4em;
        border: none;
        font-size: 1.2rem;
        background-color: #000;
        color: #ffbe00;
        width:180px;
        height: 30px;
    }
    .members img{
        width:100%;
        height:420px;
    }
    .members img:hover{
        background-color: #242424;
    }
    .mem1,.mem2,.mem3{
        position: relative;
    }
    .overlay,.overlay1{
        position: absolute;
        top:0px;
        bottom:0;
        left:0;
        right:0;
        opacity: 0;
        transition: .5s ease;
        background-color: #242424;
    }
    .overlay1:hover{
        width:380px;
    }
    .mem1:hover .overlay,.mem2:hover .overlay,.mem3:hover .overlay1{
        opacity: 0.8;
    }
    .overlay h2,.overlay1 h2{
        margin-top: 7.5em;
        color: #ffbe00;
    }
    .contact_desc img{
        margin-left: 12em;
        margin-top: 1em;
        width:200px;
        height:100px;
    }
    .contact_desc p{
        margin-left: 8em;
        text-align: center;
    }
    .socialicons{
        margin-left: 9.3em;
    }
    .socialicons a{
        margin-left: 0.7em;
        height: 30px;
        width: 30px;
        padding: 0.6em;
        display: inline-block;
        text-align: center;
        border-radius: 50%;
        border:3px solid #242424;
    }
    .socialicons a:hover{
        border:3px solid #ffbe00;
    }
    .socialicons .fa::before{
        margin-left: 0.1em;
        color:#ffbe00;
        font-size: 1.7rem;
    }
    .contact_form input{
        margin-right: 0.3em;
        font-family: 'Archivo', sans-serif;
        width: 39.5%;
        /* margin-right: 10px; */
        background-color: #fff;
        padding:10px 20px;
        transition: .3s;
        border:1px solid #242424;
        border-radius: 25px;
    }
    .contact_form .emailid{
        width:89%;
    }
    textarea{
        font-family: 'Archivo', sans-serif;
        height:100px;
        width:440px;
        border-radius: 10px;
        transition: .3s;
        padding: 14px 20px;
        margin-bottom: 1.3em;
        background-color: #fff;
        border: 1px solid #242424;
    }
    .contact_form a,.bookseat a,.details-map a,.bookseat a{
        background-color: #ffbe00;
        padding: 20px 40px;
        color:#000;
        border-radius: 30px;
        text-decoration: none;
    }

    #subcon{
        background-color: #ffbe00;
        padding: 20px 40px;
        color:#000;
        border-radius: 30px;
        text-decoration: none;
    }

    .details-map a{
        margin-top: 0.7em;
        margin-left: -3em;
    }
    .bookseat{
        margin-top: 6.5em;
    }
    .action h3{
        margin-top: 4em;
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
    #booknowtab{
        cursor: pointer;
        position: relative;
        margin-top: 8px;
        left: 81.5%;
        background-color: #ffbe00;
        padding: 15px 30px;
        color: #000;
        border-radius: 30px;
        text-decoration: none;
        border-color: black;
    }
    #seemap{
        cursor: pointer;
        position: relative;
        margin-top: 8px;
        top: 0%;
        left: 0%;
        background-color: #ffbe00;
        padding: 15px 30px;
        color: #000;
        border-radius: 30px;
        text-decoration: none;
        border-color: black;
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
    <div class="bg_img">
        <img src="./Images/background.png" alt="backgroundimage">
        <div class="social">
            <a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a target="_blank" href="https://wa.me/+919672433032"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        </div>
        <div class="bottominfo">
            <div class="items">
                <h3 class="shift"><i class="fa fa-circle" aria-hidden="true"></i>Best Chef</h3>
                    <div class="box">8</div>
                        <p style="margin-right:3.7em;margin-top:0.7em">Jamie Oliver <br>London, UK</p>                    
            </div>
        </div>
    </div>
    <div class="container">
        <header>
            <div class="logo"><a href="home.php"><img style="width:150px;height:63px;" src="./Images/logo.png" alt=""></a></div>
            <ul>
                <a href="home.php"><li class="active">Home</li></a>
                <a href="aboutus.php"><li>About</li></a>
                <a href="menu.php"><li>Menu</li></a>
                <li id="table">Table Booking</li>
                <a href="order.php"><li>Order</li></a>
                <a href="contactpage.php"><li>Contact</li></a>
            </ul>
            <div class="search_nav">
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
        <div class="content_container">
            <div class="content">
                <h3>Are you Hungry ?</h3>
                <h1>Don't Wait !</h1>
                <p>Lets start to order food now</p>
                <a style="color:white" href="menu.html"><div class="checkout">Checkout Menu</div></a>
            </div>
            <div class="dish_img">
                <img src="./Images/food.png" alt="">
            </div>
        </div>
    </div>
    <div class="food">
        <div class="right nav">
            <i class="fa fa-caret-right" aria-hidden="true"></i>
        </div>
        <div class="item">
            <div class="item_img">
                <img src="./Images/menu1.jpg" alt="">
            </div>
            <div class="item_content">
                <h3 class="shift"><i class="fa fa-circle" aria-hidden="true"></i>Breakfast</h3>
            <p>All happiness depends on a leisurely breakfast.</p>
            </div>       
        </div>
        <div class="item">
            <div class="item_img">
                <img src="./Images/menu2.jpg" alt="">
            </div>
            <div class="item_content">
                <h3 class="shift"><i class="fa fa-circle" aria-hidden="true"></i>Appetizer</h3>
            <p>While eating your appetizer, don't be concerned with dessert.</p>
            </div>       
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span> 
            <img src="./Images/tableoverlay.png" class="tabover">
            <a href="./contactpage.php"><button id="booknowtab">BOOK NOW</button></a>
        </div>
    </div>
    <script src="./JS/tableoverlay.js"></script>
</body>
</html>