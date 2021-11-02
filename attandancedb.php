<?php
include 'dbcon.php';

$i = 0;
//s_date e_date
if(!isset($_POST['exp']))
{
$sql = "SELECT *,time_to_sec(timediff(`Logout_TIme`,`Login_Time`))/60 as work_hr FROM attandance where `email` = '{$_POST['username']}' and `Date` between '{$_POST['s_date']}' and '{$_POST['e_date']}' order by `Date` desc";
}else{
    $sql = "SELECT *,time_to_sec(timediff(`Logout_TIme`,`Login_Time`))/60 as work_hr FROM attandance where `email` = '{$_POST['username']}' and `Date` between '{$_POST['s_date']}' and '{$_POST['e_date']}' and Login_Time < '{$_POST['exp']}' order by `Date` desc ";
  
}
$run = $con->query($sql);
$data = array();
while($row=$run->fetch_assoc())
{
    $data[$i]= $row;
    $i=$i+1;
}
print_r(json_encode($data));
// echo $_GET['username'];
?>