<!-- https://imgd.aeplcdn.com/0x0/n/cw/ec/27074/civic-exterior-right-front-three-quarter-148156.jpeg -->
<?php
$url = "https://imgd.aeplcdn.com/0x0/n/cw/ec/27074/civic-exterior-right-front-three-quarter-148156.jpeg";   
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
curl_setopt($ch, CURLOPT_URL, $url);   
$res = curl_exec($ch);   
if($res)
echo "<img src=\"".$url."\">";
else
echo "invalid";   
?>