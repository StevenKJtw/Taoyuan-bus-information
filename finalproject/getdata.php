<?php
$db = new mysqli('localhost','sunning','hello,sunning','web_final');
//mysqli_query($db, "set character set 'utf8'");

//$arr = $_REQUEST;  
//$vnameid =$arr['routeid'];
$vnameid =$_POST['routeid'];

if ($db->connect_error) {
    die('�B��ʧ��' . $db->connect_error); // �Y�ώ��B���e�`����r
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
			echo json_encode('{"error": "��o�Y��"}');
		}
	}
	else{
		echo json_encode('{"error": "��o�Y��"}');
	}
	$db->close();
//$data = json_encode(array('a'=>$vnameid, 'b'=>$vtele));
//$query = "INSERT INTO cardvip(namevip,tel) VALUES ('"+$vnameid+"','"+$vtele+"')";
//$db->query($query);
//$data = json_encode(array('a'=>$vnameid, 'b'=>$vtele)); 
//echo $data;
?>