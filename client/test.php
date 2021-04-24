<?php 
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

function GetData($ApiURL, $param)
{
	$ParamsFullURL = $ApiURL ."?". $param;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $ParamsFullURL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_GET, true);	
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
} 

function getMovieAll($ApiURL, $param)
{
	$param_data = implode("&", $param);
	$json = GetData($ApiURL, $param_data);
	$result = json_decode($json);

	return $result;
}

$ApiURL = "http://147.139.193.255/api/server/apiarray.php;

// GET MOVIE ALL
$param = array(
	"OrderBy=DESC"
);
$MovieAll = getMovieAll($ApiURL, $param);
if ($MovieAll)
{
	echo json_encode($MovieAll);
	exit();	
	
}else{

	$result = array ('result'=>false,'resultCode' => 'E999', 'resultDesc'=> 'Error Return API');
	echo json_encode($result);
	exit();	
	
}
?>