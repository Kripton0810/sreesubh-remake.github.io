<?php
include 'dbcon.php';

$i = 0;
$sql = "SELECT * FROM employee";

$run = $con->query($sql);
$data = array();
while($row=$run->fetch_assoc())
{
    $data[$i]= $row;
    $i=$i+1;
}
print_r(json_encode($data));

?>