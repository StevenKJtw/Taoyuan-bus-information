<?php
$db = new mysqli('localhost','sunning','hello,sunning','web_final');
//mysqli_query($db, "set character set 'utf8'");

//$arr = $_REQUEST;  
//$vnameid =$arr['routeid'];
$vnameid =$_POST['routeid'];

if ($db->connect_error) {
    die('連接失敗' . $db->connect_error); // 資料庫連接錯誤的情況
  }
$sql="SELECT * FROM getstop Where RouteID='$vnameid';";
$db->set_charset("utf8");
$result=$db->query($sql);

if($result){
		if($result->num_rows>0){
			$querydata=$result->fetch_all(MYSQLI_ASSOC);
			$result->close();
			echo json_encode($querydata);
		}
		else{
			echo json_encode('{"error": "查無資料"}');
		}
	}
	else{
		echo json_encode('{"error": "查無資料"}');
	}
	$db->close();
//$data = json_encode(array('a'=>$vnameid, 'b'=>$vtele));
//$query = "INSERT INTO cardvip(namevip,tel) VALUES ('"+$vnameid+"','"+$vtele+"')";
//$db->query($query);
//$data = json_encode(array('a'=>$vnameid, 'b'=>$vtele)); 
//echo $data;
?>