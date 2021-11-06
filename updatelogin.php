<?php
include 'dbcon.php';
if(isset($_POST['email']))
{
$sql = "INSERT INTO `attandance`(`Email`, `Status`, `Date`, `Login_Time`, `Login_location`) VALUES ('".$_POST['email']."','".$_POST['status']."','".$_POST['date']."','".$_POST['time']."','3/3 H.S.Tower 8thAvenue, Road, Bistupur, Jamshedpur, Jharkhand 831001, India') ON DUPLICATE KEY UPDATE Status=1,Login_Time='".$_POST['time']."'";
}
else
{
    echo '500';
}
$run = $con->query($sql);
if($run)
{
    echo 200;
}
else
{
    echo 404;
}
?>