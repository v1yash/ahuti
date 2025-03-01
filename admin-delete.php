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

<?php
                if(isset($_GET['user_sno'])  )
                {

                    $user_id=$_GET['user_sno'];
                    // $query = "SELECT * FROM `ahuti` where sno='$user_id' ";
                    // $query_run= mysqli_query($con,$query);
                // }
                // if(isset($_POST['deleteuser']))
                // {
                    // $user_id = $_POST['user_sno'];
                    
                    $qry2 = "DELETE FROM ahuti WHERE `ahuti`.`sno`= '$user_id';";
                    $query_run= mysqli_query($con,$qry2);
                    header("location:admin.php");
                    
                }
            
                ?>
           