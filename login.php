
<?php
$login = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
        $conn = mysqli_connect("localhost","root","","yash");
        if(!$conn)
        {
            echo "error!". mysqli_connect_error();
        }
      

        $username = $_POST["uname"];
        $password = $_POST["pass"];

               
        $sql = "Select * from yash where uname='$username'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
            if ($num == 1)
            {
             while($row=mysqli_fetch_assoc($result))
                {
                    if($password==$row['pass'])
                    { 
                        $login = true;
                        session_start();
                        $_SESSION['status'] = true;
                        $_SESSION['username'] = $username;
                        header("location: admin.php");
                    }
            
                    else
                    {
                        $showerror = "username and password not match...!";
                    }
                }  
            }
            else
            {
                $showerror = "username and password not match...!.....";
            }
        }        
?>


<html>
<head>
    <title>login</title>
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
    if ($login)
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
     <h1 >login to our website</h1><br>
     <form action="login.php" method="post">
        <div>
            <label >Username</label>
            <input type="text"  name="uname">
        </div>
        <div >
            <label >Password</label>
            <input type="password"  name="pass" >
        </div>
        
        <button type="submit" class="btn">login</button>
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
