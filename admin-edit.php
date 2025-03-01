<?php
session_start();

if(!isset($_SESSION['status']))
{
    echo "<h3>".$_SESSION['status']."</h3>";
  header("location: admin.php");
  exit;
}
$server ="localhost";
$user ="root";
$pass ="";
$data = "ahuti";
$con =mysqli_connect($server,$user,$pass,$data);

    if(!$con)
    {
        die("connecton fail.." . mysqli_connect_error());
    }
    else
    {
      // echo("ok....<br>");
    }

?>

<html>
<head>
  <title>Ahuti tec.welcome</title>
    <link rel="stylesheet" href="style2.css">
    <!-- <img src="ing.jpg" class="bg" height="95%" width="100%"> -->
</head>

<body bgcolor="#636465">
  <br>
<p align="center" class="p2">welcome - <?php echo $_SESSION['username']?></p>
<p align="center" class="p2">data edit of contect table.....</p>
<br>
<br>

  <div  align="center">
    <table border="2%">
        <tr>
            <td><form action="admin-edit.php" method="post">
                <?php
                if(isset($_GET['user_sno'])  )
                {
                    $xx = $_SESSION['number'];
                    $user_id=$_GET['user_sno'];
                    $query = "SELECT * FROM `ahuti` where sno='$user_id' ";
                    $query_run= mysqli_query($con,$query);
                   

        if( mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
              ?>
                        <input type="hidden" name="sno" value="<?php echo $row['sno']; ?>">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="update your name">
                        <input type="text" name="age" value="<?php echo $row['age']; ?>" placeholder="update your Age">        
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="update your email">
                        <input type="phone" name="phone" value="<?php echo $row['phone']; ?>" placeholder="update your phone">
                        <input type="text" name="desc" value="<?php echo $row['desc']; ?>"  placeholder="update other information here">
                        <button name="updateuser" type="submit" class="btn">update</button> 
                        <!-- <button name="deleteuser" type="delete" class="btn">Delete</button>  -->
                        <a href="admin.php" class="btn">back</a> 

                        <?php
                        }
                    }
                    else{
                        echo "no data.";
                    }
                }
            if(isset($_POST['updateuser']))
            {
                $user_id = $_POST['sno'];
                $name = $_POST['name'];
                $age = $_POST['age'];
                $email = $_POST['email'];
                $phone= $_POST['phone'];
                $desc = $_POST['desc'];

                $qry = "UPDATE `ahuti` SET `sno` = '$user_id', `name` = '$name', `age` = '$age', `email` = '$email', `phone` = '$phone', `desc` = '$desc' WHERE `ahuti`.`sno` = '$user_id';";
                $query_run= mysqli_query($con,$qry);
                
                if($query_run)
                {
                    header("location:admin.php");
                     echo $name;
                    $_SESSION['status'] = "user updating ok";
                    header("location:admin.php");
                }
                else               
                {
                    header("location:admin.php");
                    echo $name;
                    $_SESSION['status'] = "user updating failed";
                    header("location:admin.php");
                }
            }
                ?>
                
        </td>
        </tr> 
           
        </table>
    </div>
    

</body>
</html>


