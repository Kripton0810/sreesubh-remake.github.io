
<?php
include 'dbcon.php';

$i = 0;

$sql = "SELECT * FROM fieldwork where `email` = '{$_POST['username']}' and date(time) between '{$_POST['s_date']}' and '{$_POST['e_date']}' order by date(time) desc";
$run = $con->query($sql);
$data = array();
while($row=$run->fetch_assoc())
{
    $data[$i]= $row;
    $i=$i+1;
}
print_r(json_encode($data));
?>