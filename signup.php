
 <?php
$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // .................................................
        $conn = mysqli_connect("localhost","root","","yash");
        if(!$conn)
        {
            echo "error!". mysqli_connect_error();
        }
        // ...............................................

        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $exists=false;
        if(($password == $cpassword)& $exists == false)
        {
            $sql ="INSERT INTO `yash` (`uname`, `pass`, `date`) VALUES ('$username', '$password',current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if ($result)
            {
                $showalert = true;
            }
        }
        else
        {
            $showerror = "password is not match.....!";
        }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>signup</title>
    <link rel="stylesheet" href="style2.css">
</head>
<header>
    <link rel="stylesheet" type="text/css" href="header.css" >
    
        <h2> Aahuti Technocrafts</h2>
        <div class="nav">
            <a href="index.html">HOME</a>
            <a href="plant.html">Plant and Machinery</a>
            <a href="product.html">Product Portfolio</a>
            <a href="http://localhost/yash/contact.php">Contact Us</a>
            <a href="http://localhost/yash/login.php">LOGIN</a>
            <!-- <a href="signup.php">signup</a> -->
        </div>
        <img src="logo.png" alt="" height="100%" width="7%">
    </header>
  <body bgcolor="#656565">
    <?php
    if ($showalert)
    {
    echo ' <div class="submg" align="center"><br>
        <strong>your account is now created and you can login...!</strong> <br>
    </div> ';
    }
    if ($showerror)
    {
    echo ' <div class="submg" align="center"><br>
        <strong>Error!</strong>'. $showerror.' <br>
    </div> ';
    }
    ?>

    <div class="container">
     <h1 >signup to our website</h1><br>
     <form action="signup.php" method="post">
        <div>
            <label >Username</label>
            <input type="text" id="username" name="username">
        </div>
        <div >
            <label >Password</label>
            <input type="password" id="password" name="password" >
        </div>
        <div >
            <label >chack Password</label>
            <input type="password" id="cpassword" name="cpassword">
        </div>
        <button type="submit" class="btn">signup</button>
     </form>
    </div>
  </body>
    <footer>
         <link rel="stylesheet" type="text/css" href="header.css" >
         <h2>reserved for Ahuti Tec.</h2>
         <p class="p">coder and designer <br>YASH</p>
         <img src="logo.png" alt="" height="100%" width="7%">
    </footer>
</html>
