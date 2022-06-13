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

if(isset($_POST["adminlog"]))
{
    $adus=$_POST["username"];
    $adpa=$_POST["password"];

    if(!empty($adus) && !empty($adpa))
    {
        $sql1 = "SELECT * FROM adminlogin WHERE username='$adus'";  
        $result1 = $conn->query($sql1);
        $row = $result1->fetch_assoc();
        if ($row["password"] == $adpa )
        {
        echo '<script type="text/javascript">'; 
        echo 'alert("Welcome Admin");'; 
        echo 'window.location.href = "home_admin.html";';
        echo '</script>';
        }
        else
        {
            echo '<script>alert("Wrong Credentials")</script>';
        }
         

    }
    else
    {
        echo '<script>alert("Enter Username and Password.")</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/login.css">
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

<title>Admin</title>
    <style>
    *{
    margin:0;
    padding:0;
}
body{
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    background-color: black;
    background-size: cover;
    width:100%;
    height:100%;
}
.container{
    background-color: black;
    border-radius: 2.5em;
    width: 1000px;
    height: 600px;
    position: fixed;
    top: 13%;
    left: 15%;
}
.imagebox{
    background-color: black;
    display: inline-block;
    width: 450px;
    height: 550px; 
    position: relative;
    top: 5%;
    left: 3.125%;
}
.logo{
    position: relative;
    top: 35%;
    left: 18%;
    width: 64%;
}
.line{
    position: absolute;
    display: inline-block;
    border-radius: 2em;
    background-color: #242424;
    width: 4px;
    height: 275px;
    top: 25%;
    left: 49.375%;
}
form{
    font-family: 'Archivo', sans-serif;
    position: relative;
    top: 8%;
    left: 0%;
    color: white;
}
.login{
    background-color: black;
    display: inline-block;
    border-radius: 1.5em;
    width: 450px;
    height: 550px; 
    position: absolute;
    top: 5%;
    right: 3.125%;
    text-align: center;
}
.usericon{
    background-color: white;
    position: relative;
    display: inline-block;
    top: 5%;
    left: -1%;
}
.adminicon{
    background-color: white;
    position: relative;
    display: inline-block;
    top: 5%;
    right: -2%;
}
button{
    border: none;
    background-color: black;
}
#adbutton{
    border: 4px solid #222222;
}
button:hover{
    cursor: pointer;
}

h2{
    position: relative;
    color: #ffbe00;
}
h5{
    position: relative;
    color: #ffbe00;
    top: 12%;
    font-family: 'Archivo', sans-serif;
    font-weight: lighter;
}
i{
    font-size: 3.5rem;
    padding: 0.4em;
    color: #ffbe00;
}
.name{
    font-family: 'Oswald', sans-serif;
    display: block;
    margin-top: 0.5rem;
    font-size: 1rem;
}

#fpass{
  cursor: pointer;
  position: absolute;
  font-family: 'Archivo', sans-serif;
  font-weight: bold;
  color: #ffbe00;
  font-size: xx-small;
  top: 85%;
  left: 16%;
  background-color: black;
  border: 0px solid black
}

.register{
    cursor: pointer;
      border-radius: 5em;
      color: black;
      background: linear-gradient(to right, #ffbe00, #ffbe00);
      align-self: center;
      border: 0;
      padding-left: 40px;
      padding-right: 40px;
      padding-bottom: 10px;
      padding-top: 10px;
      font-size: 13px;
      font-weight: lighter;
      box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
      text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
      position: relative;
      top: 14%;  
} 
.submit {
    cursor: pointer;
      border-radius: 5em;
      color: black;
      background: linear-gradient(to right, #ffbe00, #ffbe00);
      align-self: center;
      border: 0;
      padding-left: 40px;
      padding-right: 40px;
      padding-bottom: 10px;
      padding-top: 10px;
      font-size: 13px;
      font-weight: lighter;
      box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
      text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
      position: relative;
      margin-top: 1.5em;
  }* 
.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: hidden; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4);
    top: 15%;
  }
.modal-content, .modal-content1 {
    background-color: black;
    border-radius: 2em;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
    color: black;
  }
  .modal-content form, .modal-content1 form{
    color: #ffbe00;
  }
  .modal-content input, .modal-content1 input{
    font-family: 'Archivo', sans-serif;
    margin-top: 10px;
    background-color: #fff;
    padding:10px 20px;
    transition: .3s;
    border:1px solid #242424;
    border-radius: 25px;
  }
.close, .close1 {
    color: #aaaaaa;
    display: block;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
.close:hover, .close:focus, .close1:hover, .close1:focus {
    color: #ffbe00;
    text-decoration: none;
    cursor: pointer;
  }

#newuser{
  position: absolute;
  font-family: 'Oswald', sans-serif;
  font-size: larger;
  color: #ffbe00;
  margin-left: 10px;
  top: 15%;
}
/*-----------------------------------------------------------------------------*/
  /*Codes for floating label*/
  .floating {
    width: 300px;
    height: 50px;
    position: relative;
    left: 17%;
    margin-bottom: 0.1rem;
    transition: background-color 0.2s ease;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
  }
  .floating__input {
    width: 70%;
    position: relative; 
    top: 20%; 
    padding: 0.2rem 0.2rem 0.2rem;
    font-size: 1rem;
    border-radius: 1rem;
    border: none;
    transition: border-color 0.2s ease;
  }
  .floating__input::placeholder {
    color: white;
  }
  .floating__label {
    font-family: 'Archivo', sans-serif;
    font-weight: lighter;
    display: flex;
    position: relative;
    font-size: 0.7rem;
    top: 52%;
    left: 13%;
    max-height: 0;
    pointer-events: none;
  }
  .floating__label::before {
    color: #ffbe00;
    content: attr(data-content);
    display: inline-flex;
    filter: blur(0);
    backface-visibility: hidden;
    transform-origin: left top;
    transition: transform 0.2s ease;
    left: 1rem;
    position: relative;
  }
  .floating__label::after {
    bottom: 1rem;
    content: "";
    height: 0.5rem;
    position: relative;
     /* transition: /*transform 180ms cubic-bezier(0, 0, 0, 0), */
      /* opacity 180ms cubic-bezier(1, 1, 1, 1) background-color 0.3s ease;  */
    opacity: 0;
    left: 0%;
    top: 100%;
    /* margin-top: -0.1rem; */
    /* transform: scale3d(0, 0, 0); */
    width: 100%; 
  }
  .floating__input:focus{
      border: 3px solid #ffbe00;
  }
  .floating__input:focus + .floating__label::after {
    transform: scale3d(10, 10, 10); 
    opacity: 1;
  }
  .floating__input:placeholder-shown + .floating__label::before {
      color: black;
    transform: translate3d(0, -2.2rem, 0) scale3d(1, 1, 1);
  }
  .floating__label::before,
  .floating__input:focus + .floating__label::before {
    transform: translate3d(0, -3.8rem, 0) scale3d(0.82, 0.82, 1);
  }
  .floating__input:focus + .floating__label::before {
     display: flex;
     background-color: aliceblue;
    color: #ffbe00;
  }
  @media (max-width:1340px){
    body{
        display:none;
    }
}
 
    </style>
</head>
<body>
    <div class="container">
        <div class="imagebox">
            <img src="./Images/logo.png" class="logo">
        </div>
        <div class="line"></div>
        <div class="login" id="log">
            <br>
            <br>
            <br>
            <h2>Choose Account Type</h2>
            <div class="usericon">
                <button><a href="index.php"><i class="fas fa-users" aria-hidden="true"><text class="name">User</text></i></a></button>
            </div>
            <div class="adminicon">
            <button id="adbutton"><a href="admin.php"><i class="fas fa-user-cog" aria-hidden="true"><text class="name">Admin</text></i></a></button>
            </div>
            <form action="http://localhost:8080/Project_24th March/admin.php" method="post">
                <div class="floating">
                    <input id="input__username" class="floating__input" name="username" type="text" placeholder="Username" >
                    <label for="input__username" class="floating__label" data-content="Username"></label>
                </div>
                <div class="floating">
                    <input id="input__password" type="password" class="floating__input" name="password" type="text" placeholder="Password"> 
                    <label for="input__password" class="floating__label" data-content="Password"></label>
                </div>
                <input type="submit" value="LOGIN" class="submit" name="adminlog">
            </form>
        </div>
</body>
</html>