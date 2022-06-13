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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
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
<link rel="icon" href="./Images/sitelogo.png" type="image/icon type">

<title>Inventory | Admin</title>
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
        .fa-home::before{
            z-index: 10;
            top:16%;
            right:22.5%;
            position: absolute;
            padding: 0.3em;
            color:#ffbe00;
            font-size: 1.4rem;
        }
        .fa-sign-out::before{
            z-index: 10;
            position: absolute;
            top:16%;
            right:20%;
            padding: 0.3em;
            color:#ffbe00;
            font-size: 1.4rem;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 1440px;
            width:85%;
            padding:14em 6.8em 8.1em;
            color:#fff;
            position: relative;
        }
        .logo{
            position: absolute;
            left:14%;
            top:10%;
        }
        .admin{
            position: absolute;
            left:44%;
            top:23%;
            color:#ffbe00;
            font-size:1.2rem;
            font-weight: 600;
        }
        .admin::before{
            content: "";
            position: absolute;
            top:8px;
            left:120px;
            width:40px;
            height:2px;
            background-color: #ffbe00;
        }
        .invoice-box {
            max-width: 800px;
            position: absolute;
            top:32%;
            left:20%;
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
        }
        .invoice-box table td {
            padding: 5px;
        }
        .invoice-box table tr.heading th {
            background: #222222;
            color:white;
            font-weight: bold;
        }
        td{
            color:#ffbe00;
            text-align:center;
            border-bottom:2px solid #222222;
        }
        @media (max-width:1340px){
    body{
        display:none;
    }
}
    </style>

</head>
<body>
<a href="admin.php"><img class="logo" src="./Images/logo.png" alt=""></a>
    <a href="home_admin.html"><i class="fa fa-home" aria-hidden="true"></i></a>
    <a href="admin.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    <h3 class="admin">INVENTORY</h3>
        <div class="invoice-box container">
            <table cellpadding="0" cellspacing="0">
                <tr class="heading">
                    <th width="5%">ID</th>
                    <th width="8%">Dish Image</th>
                    <th width="12%">Dish Name</th>
                    <th width="6%">Price ( in Rs )</th>
                    <th width="8%">Stars</th>
                </tr>
                <?php 
$sql = "SELECT * FROM ordering";  
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){

        ?>
                <tr class="item">
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo '<img class="proimage" style="width:150px;height:160px;"src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'?></td>
                    <td style="color:white"><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td>
                        <?php 
                            for($x=0;$x<$row["stars"];$x++){
                                    ?>  
                                <i class="fa fa-star" aria-hidden="true"></i>

                        <?php }?>
                    </td>
                </tr>
                <br>
                
    <?php } ?>
<?php } ?>

            </table>
        </div>
</body>
</html>