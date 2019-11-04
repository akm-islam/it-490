<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
//$type="login";
//$username="azi3";
//$pass="1234";
$type=$_GET["type"];
$type2="sort";
if($type=="cregistration"){
    $location=$_GET['address'];
    $storename=$_GET['storename'];
    $email=$_GET['email'];
    $category=$_GET['category'];
    $lat=$_GET['lat'];
    $longit=$_GET['longit'];
    $pass=$_GET['password'];
    $type=$_GET['type'];
    $req = array("type"=>$type,"location"=>$location,"storename"=>$storename,"email"=>$email,"category"=>$category,"lat"=>$lat,"longit"=>$longit,"password"=>$pass);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
     echo "Your registration is succesfull \n\n";
    }
    else{
    echo "registration is Failed \n\n";
    }    
}
else if($type2=="sort"){
  $email="azi3@njit.edu";
  $req = array("type"=>"sort","email"=>$email);
  $response = $client->send_request($req);
  //convert std class to array
  $array = json_decode(json_encode($response), True);
  echo json_encode($array);
  //print_r($array);  
}

else if($type=="uregistration"){
    $location=$_GET['address'];
    $email=$_GET['email'];
    $lat=$_GET['lat'];
    $longit=$_GET['longit'];
    $pass=$_GET['password'];
    $type=$_GET['type'];
    $req = array("type"=>$type,"location"=>$location,"email"=>$email,"lat"=>$lat,"longit"=>$longit,"password"=>$pass);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
     echo "Your registration is succesfull \n\n";
    }
    else{
    echo "registration is Failed \n\n";
    }    
}
else if($type=="Login"){
    $email=$_GET["email"];
    $pass=$_GET["password"];
    $type=$_GET["type"];
    $req = array("type"=>$type,"email"=>$email, "type"=>$type,"password"=>$pass);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
        echo '
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
               <li class="nav-item active">
                 <a class="nav-link" href="./01_userLoggedIn/userLoggedIn.php">Enter</a>
               </li>
             </ul>
           </div>
         </nav>		
           ';
    }
    else{
    echo "Login Failed \n\n";
    }
}
else if($type=="cLogin"){
    $email=$_GET["email"];
    $pass=$_GET["password"];
    $type=$_GET["type"];
    $req = array("type"=>$type,"email"=>$email, "type"=>$type,"password"=>$pass);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
     echo '
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item active">
			  <a class="nav-link" href="./02_client_loggedIn/clientLoggedIn.php">Enter</span></a>
			</li>
		  </ul>
		</div>
	  </nav>		
        ';
        //echo "Your login is succesfull \n\n";
     //header("Location: http://localhost/it-490/01_php_scripts/02_client_loggedIn/clientLoggedIn.php");
    }
    else{
    echo "Login Failed \n\n";
    }
}
else if($type=="Qadd_client"){
  $queueid=$_GET["queueid"];
  $queueduration=$_GET["queueduration"];
  $type=$_GET["type"];
  $req = array("type"=>$type,"queueid"=>$queueid, "type"=>$type,"queueduration"=>$queueduration);
  $response = $client->send_request($req);
  //convert std class to array
  //print_r($response);
  if($response==1){
   echo '
   <p>Added to the queue</p>
      ';
      //echo "Your login is succesfull \n\n";
   //header("Location: http://localhost/it-490/01_php_scripts/02_client_loggedIn/clientLoggedIn.php");
  }
  else{
  echo "Failed \n\n";
  }
}
else if($type=="Qremove_client"){
  $queueid=$_GET["queueid"];
  $type=$_GET["type"];
  $req = array("type"=>$type,"queueid"=>$queueid, "type"=>$type);
  $response = $client->send_request($req);
  //convert std class to array
  //print_r($response);
  if($response==1){
   echo '
   <p>Removed from the queue</p>
      ';
      //echo "Your login is succesfull \n\n";
   //header("Location: http://localhost/it-490/01_php_scripts/02_client_loggedIn/clientLoggedIn.php");
  }
  else{
  echo "Failed \n\n";
  }
}
?>