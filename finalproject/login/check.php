<?php
	//error_reporting(E_ALL & ~E_NOTICE);
	$mysql_server_name='localhost'; //host名
	$mysql_username='sunning'; //mysql用户名
	$mysql_password='hello,sunning'; //mysql密碼
	$mysql_database='web_final'; //改mysql database
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting"); //連接到數據庫
	mysql_query("set names 'utf8'"); //utf8國際編碼
	mysql_select_db($mysql_database); //選擇goxml數據庫
	//require_once ("mysql_connect.php");
	$name=$_POST['name'];
	$password=$_POST['password'];

	
	$sql = "select * from login where user='".$name."';";
	//$result = mysql_query($sql);
	
   if ( !( $result = mysql_query( $sql, $conn ) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysql_error()  );
   }
	
	
	while($colum= mysql_fetch_array($result))//一個一個獲取資料，並保存在$arr_distance2二維數組中
	{
		$id=$colum['user'];
		$pass=$colum['password'];
	}
	if($name == "")
	{
		echo "請填寫用戶名<br>";
		echo "<script type='text/javascript'>alert('請填寫用戶名');location='login.html';</script>";
	}
	elseif($password == "")
	{
		//echo "請填寫密碼<br><a href='login.php'>返回</a>";
		echo"<script type='text/javascript'>alert('請填寫密碼');location='login.html';</script>";
	}
	else
	{ 
		if(($id == $name) && ($pass == $password))
        {
			//echo "驗證成功！<br>";
        	echo"<script type='text/javascript'>alert('驗證成功！');location='../osm.html?name=$name';</script>";
        }    
		else
        { //echo "密碼錯誤<br>";
			echo"<script type='text/javascript'>alert('密碼錯誤');location='login.html';</script>";
		}
	}
?>