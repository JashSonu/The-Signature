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
$q = $_SESSION["name"];
$w = $_SESSION["email"];
$orid = $_SESSION["oid"];

if(isset($_POST["placeorder"]))
{
    $fn=$_POST["fname"];
    $ln=$_POST["lname"];
    $em=$_POST["email"];
    $ph=$_POST["phoneno"];
    $ho=$_POST["houseno"];
    $ct=$_POST["city"];
    $st=$_POST["state"];
    $pn=$_POST["pincode"];
    $cn=$_POST["country"];
    $pm=$_POST["payment"];

    if(!empty($fn) && !empty($ln) && !empty($em) && !empty($ph) && !empty($ho) && !empty($ct) && !empty($st) && !empty($pn) && !empty($cn) && !empty($pm))
    {
        if(!preg_match("/^[a-zA-Z]*$/",$fn) && !preg_match("/^[a-zA-Z]*$/",$ln) && !preg_match("/^[a-zA-Z]*$/",$ct) && !preg_match("/^[a-zA-Z]*$/",$st) && !preg_match("/^[a-zA-Z]*$/",$cn))
        {
            echo '<script>alert("Only Letters")</script>';
        }
        elseif (!filter_var($em,FILTER_VALIDATE_EMAIL))
        {
            echo '<script>alert("Invalid Email Syntax")</script>';
        }
        elseif (strlen($ph) != 10)
        {
            echo '<script>alert("Phone Number - Only 10 Digits")</script>';
        }
        elseif (strlen($pn) != 6)
        {
            echo '<script>alert("Pincode - Only 6 Digits")</script>';
        }
        else
        {
            $sqla = "INSERT INTO full_details (firstn,lastn,email,pnum,hnum,city,state,pincode,country,payment,ordid) VALUES ('$fn', '$ln', '$em', '$ph', '$ho', '$ct', '$st', '$pn', '$cn', '$pm', '$orid')";
            if($conn->query($sqla) === true )
            {
                echo '<script>alert("Order Placed")</script>';
                echo '<script>window.location.href = "endscreen.php"</script>';
            }
        }
    }
    else
    {
        echo '<script>alert("Enter All Details")</script>';
    }
}

if(isset($_POST["continue"]))
{
    $n1 = $_POST["cardn"];
    $cn1 = $_POST["cardnum"];
    $me = $_POST["edt1"];
    $ye = $_POST["edt2"];
    $cp = $_POST["cv"];

    if(!empty($n1) && !empty($cn1) && !empty($me) && !empty($ye) && !empty($cp))
    {
        if(!preg_match("/^[a-zA-Z-' ]*$/",$n1))
        {
            echo '<script>alert("Only Letters and White Spaces")</script>';
        }
        else if(!preg_match("/^[0-9]*$/",$cn1) || strlen($cn1) != 16)
        {
            echo '<script>alert("Card Number - Only 16 Digits")</script>';
        }
        else if(!preg_match("/^[0-9]*$/",$cp) || strlen($cp) != 3)
        {
            echo '<script>alert("CVV - Only 3 Digits")</script>';
        }

    }
    else
    {
        echo '<script>alert("Enter All Details")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/style.css"> -->
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
    <title>Details</title>
</head>
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
        padding:3em 6.8em 8.1em;
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
        margin-top:-2em;
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
    .modal-content1 {
        background-color: black;
        /* background-image: url(Images/Menu/Pizza.png);
        background-size: cover; */
        border-radius: 15px;
        margin: auto;
        padding: 20px;
        border: 3.5px solid #242424;
        width: 28%;
        height: 49%;
        color: black;
        position: relative;
        top: 10%;
    }
    .modal-content2 {
        background-color: black;
        border-radius: 15px;
        margin: auto;
        padding: 20px;
        border: 3.5px solid #242424;
        width: 75%;
        height: 75%;
        color: black;
    }
    .close, .close1, .close2 {
        color: white;
        display: block;
        float: right;
        font-size: 30px;
        font-weight: bold;
    }
    .close:hover, .close:focus, .close1:hover, .close1:focus, .close2:hover, .close2:focus {
        color: #ffbe00;
        text-decoration: none;
        cursor: pointer;
    }
    .cv{
        margin-top: 5px;
        width:50%;
        height: 40%;
        display: inline-block;

    }
    #cv1{
        position: absolute;
        top: 65%;
        left: 60%;
    }
    .tabover{
        position: relative;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 85%;
    }
    .details{
        margin-top: -2em;
        margin-left: 10em;
        display: grid;
        grid-template-columns: 650px 350px;
        /* margin-bottom: 130px; */
        column-gap: 50px;
    }
    .details_desc{
        margin-left: 1.5em;
        margin-top: -4.9em;
    }
    .details_desc h3,.bill_img h3{
        position: relative;
        margin-top: 2em;
        color:#ffbe00;
        font-size:1.1em;
        font-weight: 600;
        /* font-style: italic; */
    }
    .bill_img img{
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }
    .billbut{
        position: relative;
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 64%;
        left: 79%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }
    .billbut .billb{
        font-family: 'Archivo', sans-serif;
        font-size: large;
        background-color: #ffbe00;
        padding: 20px 40px;
        color:#000;
        border: 0px solid black;
        border-radius: 25px;
        text-decoration: none;
    }
    .billb{
        position:absolute;
        margin-top:-3.2em;
        margin-right:4.5em;
        right:35%;
    }
    .bill_img{
        margin-top:-1.5em;
    }
    .bill_img:hover img{
        opacity: 0.3;
    }
    .bill_img:hover .billbut{
        opacity: 1;
    }
    .bill_img h3{
        margin-top: -1em;
    }
    .details_desc h3{
        margin-left: -4em;
    }
    .details_desc h3::before,.bill_img h3::before{
        content: "";
        position: absolute;
        top:8px;
        left:160px;
        width:40px;
        height:2px;
        background-color: #ffbe00;
        /* transform: translateX(-50%); */
    }
    .bill_img h3::before{
        left:100px;
    }
    .billingdetails{
        margin-left: -5em;
    }
    .billingdetails input{
        margin-right: 0.3em;
        font-family: 'Archivo', sans-serif;
        width: 30%;
        /* margin-right: 10px; */
        background-color: #fff;
        padding:10px 20px;
        transition: .3s;
        border:1px solid #242424;
        border-radius: 25px;
        }
    .billingdetails .emailid,.billingdetails .address,.billingdetails .address2,.billingdetails .phoneno{
        width:67%;
    }
    .billingdetails .address{
        margin-top: 0.3em;
    }
    .billingdetails label{
        margin-left: .8em;
        margin-top: -1em;
        font-size: 0.8rem;
        color:#ffbe00;
    }
    input[type=radio]{
        width:5%;
    }
    input[type=radio]:checked{
        background: #ffbe00;
    }
    .billingdetails .rb{
        color:white;
        margin-left: -0.4em;
    }
    input[type=submit]{
        width:36%;
        cursor: pointer;
        background-color: #ffbe00;
        padding: 15px 35px;
        color:#000;
        border-radius: 25px;
        background: linear-gradient(to right, #ffbe00, #ffbe00);
        font-size: 13px;
        position: relative;
    }

    .modal input, .modal select{
        font-family: 'Archivo', sans-serif;
        background-color: #fff;
        padding:10px 20px;
        transition: .3s;
        border:1px solid #242424;
        border-radius: 25px;
        margin-top: 5px;
        }
    .modal select{
        margin-right: 25px;
    }

/* ------BILL CSS------ */

    .invoice-box {
		max-width: 800px;
		margin: auto;
		padding: 30px;
		border:2px solid #222222;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
		font-size: 16px;
		line-height: 24px;
		font-family: 'Archivo', sans-serif;
		color: #ffbe00;
	}

	.invoice-box table {
		width: 100%;
		line-height: inherit;
		text-align: left;
	}
	.title img{
		width:30px;
		height:110px;
	}
	.invoice-box table td {
		padding: 5px;
		vertical-align: top;
	}

	.invoice-box table tr td:nth-child(4) {
		text-align: right;
	}

	.invoice-box table tr td:nth-child(3) {
		text-align: right;
	}
	
	.invoice-box table tr td:nth-child(2) {
		text-align: right;
	}

	.invoice-box table tr.top table td.title {
		font-size: 45px;
		line-height: 45px;
		color: #ffbe00;
	}

	.invoice-box table tr.information table td {
		padding-bottom: 40px;
	}

	.invoice-box table tr.heading td {
		background: #222222;
		color:white;
		font-weight: bold;
	}
	.invoice-box table tr.item.last td {
		border-bottom: none;
	}
	.invoice-box table tr.total td:nth-child(4) {
		font-weight: bold;
	}
	.bill{
		color:#ffbe00;
		position:absolute;
		left:18%;
		top:14%;
	}
	.bill::before{
		content: "";
		position: absolute;
		top:8px;
		left:50px;
		width:40px;
		height:2px;
		background-color: #ffbe00;
	}
	.order{
		position:absolute;
		left:43.5%;
		bottom:5%;
		background-color: #ffbe00;
		padding: 15px 35px;
		color:#000;
		border-radius: 25px;
		text-decoration: none;
	}
	.arrow{
		text-decoration:none;
	}
	.fa-arrow-left::before{
		position:absolute;
		top:5%;
		left:3%;
		font-size:1.4rem;
		color:#ffbe00;
	}

    .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        font-family: 'Archivo', sans-serif;
        top: 180%;
        left: 10%;
        background-color: #222222;
        width: 260px;
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
    <section class="details">
        <section class="details_desc">
            <h3 style="color:#ffbe00">BILLING DETAILS</h3>
            <br><br>
            <form class="billingdetails" action="http://localhost:8080/Project_24th March/details.php" method="POST">
                <input type="text" placeholder="First Name" name="fname" id="fname">
                <input type="text" placeholder="Last Name" name="lname" id="lname">
                <br>
                <br>
                <input class="emailid" type="text" placeholder="Email ID" name="email" id="email">
                <br><br>
                <input class="phoneno" type="text" placeholder="Phone Number" name="phoneno" id="phoneno">
                <br><br>
                <label>ADDRESS</label>
                <br>
                <input class="address" type="text" placeholder="House Number & Street Name" name="houseno" id="houseno">
                <br><br>
                <!-- <input class="address2" type="text" placeholder="Apartment, Suite, Unit ( Optional )" name="apartment" id="apartment">
                <br><br> -->
                <input type="text" placeholder="Town / City" name="city" id="city">
                <input type="text" placeholder="State" name="state" id="state">
                <br><br>
                <input type="text" placeholder="Pinocde" name="pincode" id="pincode">
                <input type="text" placeholder="Country" name="country" id="country">
                <br><br>
                <label>PAYMENT METHOD</label>
                <br><br>
                <input type="radio" id="cod" name="payment" value="Cash On Delivery" checked>
                <label class="rb" for="cod">Cash On Delivery</label>
                <input type="radio" id="card" name="payment" value="Card">
                <label class="rb" for="card">Card</label>
                <br><br>
                <input class="submit" type="submit" value="PLACE ORDER" id="placeorder" name="placeorder">
            </form>
        </section>
        <section class="bill_img">
            <h3 style="color:#ffbe00">YOUR BILL</h3><br>
            <img style="height:450px;width:380px;" src="./Images/bill1.png" alt="" />
            <div class="billbut">
                <form action="http://localhost:8080/Project_24th March/details.php" method="POST">
                    <input type="button" class="billb" value="Show Bill" name="billshow" id="billshow">
                </form>
            </div>
        </section>
    </section>
    <br>
    <br>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span> 
            <img src="./Images/tableoverlay.png" class="tabover">
            <a href="./contactpage.php"><button id="booknowtab">BOOK NOW</button></a>
        </div>
    </div>
    <div id="myModal1" class="modal">
        <div class="modal-content1">
            <span class="close1">&times;</span> 
            <h3 style="color:#ffbe00">CARD DETAILS</h3>
            <br>
            <form action="http://localhost:8080/Project_24th March/details.php" method="POST">
            <input type="text" placeholder="Name On Card" name="cardn" id="cardn" size="43">
            <input type="text" placeholder="Card Number" name="cardnum" id="cardnum" size="43">
            <select style="width:42%" class="edt1" name="edt1">
                <option value="jan">01 (Jan)</option>
                <option value="feb">02 (Feb)</option>
                <option value="mar">03 (March)</option>
                <option value="apr" selected >04 (April)</option>
                <option value="may">05 (May)</option>
                <option value="jun">06 (June)</option>
                <option value="jul">07 (July)</option>
                <option value="aug">08 (Aug)</option>
                <option value="sep">09 (Sept)</option>
                <option value="oct">10 (Oct)</option>
                <option value="nov">11 (Nov)</option>
                <option value="dec">12 (Dec)</option>
            </select>
            <select style="width:42%;margin-left:-1.8em;" class="edt2" name="edt2">
                <option value="2021">2021</option>
                <option value="2022" selected>2022</option>
                <option value="2023">2023</option>
                <option value="2024" >2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>
            <br>
            <p><img src="./Images/cvv.png" class="cv">
            <input style="width:21%;margin-top:-4.8em;margin-left:-3em" type="password" placeholder="CVV" name="cv" id="cv1">
            <p><input class="submit" type="submit" value="CONTINUE" id="continue" name="continue">
            </form>
        </div>
    </div>

    <div id="myModal2" class="modal">
        <div class="modal-content2">
            <span class="close2">&times;</span> 
                <br><br>
                <h3 class="bill">BILL</h3>
                <div class="invoice-box">
                    <table cellpadding="0" cellspacing="0">
                        <tr class="top">
                            <td colspan="4">
                                <table>
                                    <tr>
                                        <td class="title">
                                            <img src="./Images/logo.png" style="width: 100%; max-width: 300px" />
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <?php
        $sql = "SELECT * FROM placed WHERE orderid='$orid'";  
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
        ?>								
                                        <td>
                                            Order ID <?php echo "#".$row["orderid"];?><br />
                                            Created : <?php echo $row["date"];?>
                                        </td>

                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="information">
                            <td colspan="4">
                                <table>
                                    <tr>
                                    <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php echo $row["name"];?><br />
                                            <?php echo $w; ?><br />
                                        </td>
            <?php } ?>
        <?php } ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="heading">
                            <td>Item</td>
                            <td>Price (in Rs)</td>
                            <td>Quantity</td>
                            <td>Total Price (in Rs)</td>
                        </tr>
        <?php
        $sql = "SELECT * FROM placed WHERE orderid='$orid'";  
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
        ?>
                        
                        <tr class="item">
                            <td><?php echo str_replace(", ","<br>",$row["dish"]);?></td>
                            <td><?php echo str_replace(", ","<br>",$row["price"]);?></td>
                            <td><?php echo str_replace(", ","<br>",$row["quantity"]);?></td>
                            <td><?php echo str_replace(", ","<br>",$row["dishtotal"]);?></td>
                        </tr>

                        <tr class="total">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total: <?php echo $row["overalltotal"]." Rs";?></td>
            <?php }?>
        <?php } ?>
                        </tr>
                    </table>
                </div>
        </div>
    </div>

    <script src="./JS/tableoverlay.js"></script>
    <script src="./JS/payment.js"></script>
    <script src="./JS/billoverlay.js"></script>
</body>
</html>
