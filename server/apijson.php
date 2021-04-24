<?php 
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
header('Content-Type: application/json');
include_once "class.test.php";

$log = new Test();

$OrderBy = $_REQUEST['OrderBy'];

$result = $log->getAll($OrderBy);
$json = array();
$i=0;
foreach($result as $row)
{
	$json[$i]['MovieID'] = $row->MovieID;
	$json[$i]['MovieName'] = $row->Name;
	$json[$i]['RegDate'] = $row->RegDate;
	$i++;
}
$result = array ('result'=>true,'resultCode' => 'S000', 'resultDesc'=> 'Succes', 'item' => $json);
echo json_encode($result);
exit();	
?>