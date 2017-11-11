<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>PHP</title>
   </head>
   <body>
<?php

	$username = $_POST['username'];
	$content = $_POST['content'];
	if($content=="")
	{
		die( "請輸入評論後再提交！ </body></html>" );
	}
   $query = "INSERT INTO message_board (username, content) VALUES " ."('". $username."','". $content."');";
   if ( !( $database = mysql_connect( "localhost", "sunning", "hello,sunning" ) ) ){
       die( "Could not connect to database </body></html>" );
	}
	
	mysql_query( "SET NAMES 'UTF8'");
	mysql_query( "SET CHARACTER_SET_CLIENT='utf8'");
	mysql_query( "SET CHARACTER_SET_RESULTS='utf8'");
   if ( !mysql_select_db( "web_final", $database ) )
       die( "Could not open web_final database </body></html>" );
   if ( !( $result = mysql_query( $query, $database ) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysql_error() . "</body></html>" );
   }
   
   print("提交成功！") ;
   mysql_close( $database );
?>
</body>
</html>
