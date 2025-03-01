<?php
session_start();

if(!isset($_SESSION['status']) || $_SESSION['status']!=true)
{
    echo "<h3>".$_SESSION['status']."</h3>";
    header("location: login.php");
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
<p align="center" class="p2">data of contect table.....</p>
<br>
<br>

  <div  align="center">
    <table border="2%">
      <tr>
        <th>sr. no.</th>
        <th> name </th>
        <th> age </th>
        <th> email </th>
        <th> phone </th>
        <th> information </th>
        <th> time and data</th>
        <th> Action </th>
      <tr> 
        <?php 
        $query = "SELECT * FROM `ahuti`";
        $query_run = mysqli_query($con,$query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
              ?>
              <tr>
        <td><?php echo $row['sno']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['desc']; ?></td>
        <td><?php echo $row['dt']; ?></td>
        <td>
    <a href="admin-edit.php?user_sno=<?php echo $row['sno'];$_SESSION['number']=$row['sno']; ?>" >
        edit</a>
        <a href="admin-delete.php?user_sno=<?php echo $row['sno']; ?>" >delete</a> </td>

            </tr>  
              <?php
            }
        }
        else{
          ?>
          <tr>
            <td> no data ....</td>
        </tr>
          <?php
        }
          ?>
        
  </table>
  </div>
  

</body>
</html>


