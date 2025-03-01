<?php
$insert= false;
if(isset($_POST['name'])){
    $server ="localhost";
    $user ="root";
    $pass ="";
    $con =mysqli_connect($server,$user,$pass);

    if(!$con)
    {
        die("connecton fail.." . mysqli_connect_error());
    }
   
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
 
    $phone= $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `ahuti`.`ahuti` (`name`, `age`,`email`,
    `phone`, `desc`, `dt`)VALUES 
    ('$name', '$age','$email', '$phone', '$desc',
            current_timestamp()); ";
    
    if($con->query($sql)==true)
    {
        
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html>
<head>
    <title>Ahuti tec.</title>
    <link rel="stylesheet" href="style2.css">
    <img src="ing.jpg" class="bg" alt="bg"height="95%" width="100%">
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
<body >
<div class="container">
        <p class="p2">Enter your details and submit this form. </p>
        <?php 
            if($insert == true)
            echo "<p class='submg'>thanks for submitting the form.
                happy to see you again..</p>"
                ?>
        <form action="contact.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">        
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="2" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>             
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
