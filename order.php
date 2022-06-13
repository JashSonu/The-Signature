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
$d = date('Y-m-d');
$orderid=rand(10,100);
$_SESSION["oid"] = $orderid;

if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION["shopping_cart"])){
        $item_array_id=array_column($_SESSION["shopping_cart"],"item_id");
        if(!in_array($_GET["id"],$item_array_id)){
            $count=count($_SESSION["shopping_cart"]);
            $item_array=array(
                'item_id'=> $_GET["id"],
                'item_name'=>$_POST["hidden_name"],
                'item_price'=>$_POST["hidden_price"],
                'item_quantity'=>$_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count]=$item_array;
        }
        else{
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="order.php"</script>';
        }
    }
else{
    $item_array=array(
    'item_id'=> $_GET["id"],
    'item_name'=>$_POST["hidden_name"],
    'item_price'=>$_POST["hidden_price"],
    'item_quantity'=>$_POST["quantity"],
    );
    $_SESSION["shopping_cart"][0]=$item_array;
}
}

if(isset($_GET["action"])){
    if($_GET["action"]=="delete"){
        foreach($_SESSION["shopping_cart"] as $keys => $values){
            if($values["item_id"]==$_GET["id"]){
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="order.php"</script>';
            }
        }
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/order.css" />
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <title>Order</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="./Images/sitelogo.png" type="image/icon type">

    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-size: 15px;
            font-family: sans-serif;
            line-height: 1.5;
            background-color: black;
            box-sizing: border-box;
            margin-left: 3em;
        }
        div {
            display: block;
        }
        /* Saumya Nav-Bar & Social Icon */
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
        .active2{
            color:#babbbf;
        }
        .active2::after{
            content: "";
            position: absolute;
            top:25px;
            right:10px;
            width:20px;
            height:2px;
            background-color: #babbbf;
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
            box-shadow: -10px 10px 10px rgba(0, 0, 0, 0.8) ;
        }
        .social i{
            padding:0.6em 0;
        }
        .social .fa::before{
            margin-left: 0.3em;
            font-size: 1.6rem;
        }

        /* Arushi Order Now */
        .category-header{
            position: relative;
            color: #ffbe00;
            font-weight: 700;
            padding-left: 2em;
            font-size: 1.5rem;
            top: 1.3em;
        }
        .product-block{
            position: relative;
            height: 450px;
            width: 300px;
            overflow: hidden;
            border: 1px solid black;
            border-radius: 30px;
            padding: 1em;
            margin: 2em;
            background-color: white;
        }
        .product-transition{
            position: relative;
            width: 300px;
            height: 170px;
            border-radius: 20px;
            margin-top: 5.5em; 
            /* top: 13%; */
            transition: height .5s;
            background-color: blanchedalmond;
        }
        .product-block:hover .product-transition{
            position: absolute;
            bottom: 1em;
            background-color: #ffbe00;
            height: 310px;
        }
        .product-image{
            z-index:10;
            /* position: absolute; */
            height: 200px;
            width: 200px;
            top: 31%;  
            left: -1.7em;
        }
        .proimage{
            z-index:10;
        }
        .leftstar{
            margin-right:0.3em;
        }
        .fa-star::before{
            margin-left:0em;
            font-size: 1rem;
            color:#ffbe00;
            display: inline-block;
        }
        .product-block figure img {
            transform: scale(0.9);
            transition: .3s ease-in-out;
        }
        .product-block:hover figure img {
            transform: scale(1.1);
        }
        .short-description-head{

            position: relative;
            font-weight: 700;
            font-size: 1.3rem;
            top: -1em;
        }
        .short-description-content{
            position: relative;
            color: #ffbe00;
            font-size: 0.9rem;
            overflow: hidden;
            top: -3em;
        }

        .short-description-cost{
            position: relative;
            font-weight: 700;
            font-size: 1.5rem;
            top: -3.9rem;
        }
        .short-description-cost img{
            position: relative;
            float: left;
        }
        .quantity {
        position: absolute;
        padding-top: 1.5em;
        margin-left: 100px;
        top: 20.5%;
        right: 34%;
        }
        .quantity label{
            font-size:1.05rem;
            font-weight:600;
        }
        .quantity input {
        text-align: center;
        width: 20px;
        font-size: 16px;
        font-weight: 500;
        }
        .minus-btn, .plus-btn {
            width: 28px;
            height: 28px;
            background-color: blanchedalmond;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }
        .minus-btn{
            position: relative;
            top: 0.07em;
        }
        .minus-btn img {
        height: 18px;
        width:18px;
        position: relative;
            right: 0em;
            top:0.1em;
        }
        .plus-btn img {
            height: 15px;
            width:15px;
            position: relative;
            top:0.1em;
        }

        .cartbtn{
            position: absolute;
            top: 24%;
            left: 80%;
            height: 35px;
            width: 35px;
            cursor: pointer;
            border: none;
            background-color: white;
        }
        .cart img{
            position: relative;
            left: -0.5em;
            height: 30px;
            width: 30px;
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
        background-color: rgba(0,0,0,0.9);
        /* top: 15%; */
        }
        .modal-content, .model-content1 {
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
        .close, .close1 {
        color: white;
        display: block;
        float: right;
        font-size: 30px;
        font-weight: bold;
        }
        .close1{
            position:absolute;
            left:80%;
        }
        .close:hover, .close:focus, .close1:hover, .close1:focus {
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
        #bar{
            cursor: pointer;
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
        th{
            color:#ffbe00;
        }
        .cartname{
            text-align:center;
            color:#ffbe00;
        }
        td{
            color:white;
            text-align:center;
        }
        .fa-times::before{
            padding-right:1.4em;
            text-align:center;
            color:white;
        }
        .placeorder{
            position:absolute;
            left:45%;
            margin-top:1em;
            background-color: #ffbe00;
            padding: 20px 40px;
            color:#000;
            border-radius: 30px;
            text-decoration: none;
        }
        .checkout{
            position: absolute;
            font-family: 'Archivo', sans-serif;
            font-size: large;
            background-color: #ffbe00;
            padding: 20px 40px;
            color:#000;
            border: 0px solid black;
            border-radius: 25px;
            text-decoration: none;
            left: 45%;
            top:70%;
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
        width: 260px;
        height: 150px;
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
                <a href="menu.php"><li>Menu</li></a>
                <li id="table">Table Booking</li> 
                <a href="order.php"><li class="active2">Order</li></a>
                <a href="contactpage.php"><li>Contact</li></a>
            </ul>
            <div class="icon search_nav">
                <a id="bar"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                <a href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                <div class="dropdown">
                <a href=""><i style="margin-left:-0.2em"class="fa fa-user-circle" aria-hidden="true"></i></a>
                <div class="dropdown-content">
                    <?php 
                    $sql = "SELECT * FROM customer WHERE Name='$n'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) 
                    {
                    ?>
                    <h3>Name :</h3> <text><?php echo $row["Name"];?></text><br>
                    <h3>Email :</h3> <text><?php echo $row["Email"];?></text>
                    <h3>Phone No :</h3> <text><?php echo $row["Ph_no"];?></text>
                    <?php } ?>
                </div>
                </div>
            </div>
        </header>
    </div>

<span class="conatiner">
        
            <!--ROW-1-->
    <!-- <div class="category-header">
        <h2>PASTA</h2>
    </div> -->
    <?php 
            $sql = "SELECT * FROM ordering";  
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
                    ?>
                <form style="display:inline-block;margin-right:-3.2em;" method="post" action="http://localhost:8080/Project_24th March/order.php?action=add&id=<?php echo $row["id"]; ?>">
                    <div class="product-block"> 
                    <div>
                    <?php 
                        for($x=0;$x<$row["stars"];$x++){
                                ?>  
                            <i class="fa fa-star" aria-hidden="true"></i>

                    <?php }?>
                    
                    <h3 class="short-description-head"><?php echo $row["name"] ?></h3>
                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                    </div>
                    <div class="short-description-content"> 
                        <?php echo $row["description"] ?>
                    <input type="hidden" name="hidden_description" value="<?php echo $row["description"]; ?>">
                    </div>
                    <div class="short-description-cost">
                        <img src="./Images/rupeeicon.png">
                        <p><?php echo $row["price"] ?></p>
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    </div>
                    <div class="quantity">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" id="quantity" value="1">
                    </div>
                    <div class="cart">
                    <input class="cartbtn" name="add_to_cart" type="submit" value="" 
                    style="background-image: url('Images/carticon.png'); 
                    border:none; background-repeat:no-repeat;">          
                    </div>
                    <div class="product-transition"></div>
                    <div class="product-image">
                        <figure><?php echo '<img class="proimage" style="width:300px;height:300px;"src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'?></figure>
                    </div>
                    </div>
                </form>
                <?php }?>
            <?php }?>
        
</span>

<br><br>
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
        <h2 class="cartname">CART</h2>
<table align="center" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th width="30%">Dish Name</th>
            <th width="20%">Price (Rs)</th>
            <th width="15%">Quantity</th>
            <th width="25%">Total Price (Rs)</th>
            <th width="15%"></th>
        </tr>
        <div class="cart">
                <?php 
                    if(!empty($_SESSION["shopping_cart"])){
                        $total=0;
                        $name="";
                        $quan="";
                        $price="";
                        $totalpricename="";
                        foreach($_SESSION["shopping_cart"] as $keys=> $values){
                            ?>
                            <div>
                                <tr>
                                <td><?php echo $values["item_name"]; ?></td>
                                <?php $name=$name.$values["item_name"].", "; ?>
                                <td><?php echo $values["item_price"]; ?></td>
                                <?php $price=$price.$values["item_price"].", "; ?>
                                <td><?php echo $values["item_quantity"]; ?></td>
                                <?php $quan=$quan.$values["item_quantity"].", "; ?>
                                <td><?php echo number_format($values["item_quantity"]*$values["item_price"],2); ?></td>
                                <?php $totalpricename=$totalpricename.($values["item_quantity"]*$values["item_price"]).", "; ?> 
                                <td><a href="http://localhost:8080/Project_24th March/order.php?action=delete&id=
                                <?php echo $values['item_id']; ?>"><span><i class="fa fa-times" aria-hidden="true"></i></span></a></td>
                                </tr>
                            </div>
                            <?php 
                                $total=$total + ($values["item_quantity"]* $values["item_price"]);
                        }
                        ?>
                        
                    
        </div>
        <tr>
            <td style=""></td>
            <td></td>
            <td></td>
            <td><?php echo number_format($total,2); }?></td>
            <td></td>
        </tr>
        <?php
        if(isset($_POST["orderplace"]))
        {
            if(empty($_SESSION["shopping_cart"]))
            {
                echo '<script>alert("Cart Is Empty")</script>';
            }
            else
            {
                $sqlz = "INSERT INTO placed (name,dish,quantity,price,dishtotal,overalltotal,date,orderid) 
                VALUES ('$q','$name','$quan','$price','$totalpricename','$total','$d','$orderid')";
                $resultz = $conn->query($sqlz);
                if($resultz == true)
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Redirecting to Billing Details");'; 
                    echo 'window.location.href = "details.php";';
                    echo '</script>';
                    unset($_SESSION["shopping_cart"]);
                }
                else{
                    echo '<script>alert("Already Ordered")</script>';
                }
            }
            
        }
        ?>
</table>
<form action="http://localhost:8080/Project_24th March/order.php" method="POST">
<input type="submit" class="checkout" value="Checkout" name="orderplace">
    </form>
    </div>
</div>
<script src="./JS/tableoverlay.js"></script>
<script src="./JS/cartoverlay.js"></script>

</body>
</html>