<?php
	//error_reporting(0);
	Session_start();
	//require_once ("mysql_connect.php");
	//connect();
	$db = mysql_connect("localhost","sunning","hello,sunning") 
		or die("連接數據庫失敗！");

	mysql_select_db("web_final")
		or die ("不能連接到user".mysql_error());
		
	mysql_query("set names 'utf8'");
	error_reporting(0);
	date_default_timezone_set("PRC");
	$current=date('Y-m-d H:i:s',time());
	
	$name=$_POST['name'];
	$password=$_POST['password'];
	$pwd_again=$_POST['pwd_again'];
	$code=$_POST['check'];
	//error_reporting(E_ALL & ~E_NOTICE);
	$sql="select *from user where user='$name'";
	$result = mysql_query($sql);
	while($colum= mysql_fetch_array($result))//一個一個獲取資料，並保存在$arr_distance2二維數組中
	{
	$user=$colum['user'];
	}		
	
	if($name==""|| $password=="")
	{
		echo"用戶名或者密碼不能為空";
	}
	else 
	{
	if($name==$user)
	{
		echo "<script type='text/javascript'>alert('user existed');location='register.html';</script>";
	}
	else
	{
    if($password!=$pwd_again)
    {
    	echo"兩次輸入的密碼不一致,請重新輸入！";
    	echo"<a href='register.html'>重新输入</a>";
    	
    }
    else if($code!=$_SESSION['check'])
    {
		echo $_SESSION['check'];
		echo "——";
		echo $code;
    	echo"驗證碼錯誤！";
    }
    else
    {
    	$sql="insert into login (id,user,password) values('$current','$name','$password')";
    	$result=mysql_query($sql);
    	if(!$result)
    	{
    		echo"註冊不成功，用戶名已存在！";
    		echo"<a href='register.html'>返回</a>";
    	}
    	else 
    	{
    		echo"註冊成功!";
			echo"<a href='login.html'>返回登入</a>";
    	}
    }
	}
}
?>