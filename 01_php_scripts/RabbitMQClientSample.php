<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
//$type="login";
//$username="azi3";
//$pass="1234";
$type="login";
$username=$_POST["username"];
$pass=$_POST["password"];;

$req = array("username"=>$username, "type"=>$type,"password"=>$pass);
//echo  "Client sending request......\n";
$response = $client->send_request($req);
//convert std class to array
//print_r($response);
if($response==1){
 echo "Your login is succesfull \n\n";
}
else{
echo "Login Failed \n\n";
}
?>
