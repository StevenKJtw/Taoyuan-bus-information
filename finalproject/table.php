<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>PHP</title>
   </head>
   <body>
<?php
   $select = $_POST["routeid"];
   //$query = "SELECT " . $select . " FROM getstop";   SELECT * FROM getstop WHERE `RouteId`='1' AND GoBack='1'
   $query = "SELECT SeqNo,NameZh FROM getstop where RouteId='".$select."';";
   if ( !( $database = mysql_connect( "localhost", "sunning", "hello,sunning" ) ) )
       die( "Could not connect to database </body></html>" );
          mysql_query( "SET NAMES ‘UTF8′");
          mysql_query( "SET CHARACTER_SET_CLIENT='utf8'");
          mysql_query( "SET CHARACTER_SET_RESULTS='utf8'");
   if ( !mysql_select_db( "web_final", $database ) )
       die( "Could not open web_final database </body></html>" );
   if ( !( $result = mysql_query( $query, $database ) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysql_error() . "</body></html>" );
   }
   
   echo "<table border='1'>
	<tr>
	<th>編號</th>
	<th>地點</th>
	</tr>";
   while ( $row = mysql_fetch_row( $result ) )
   {
	   echo "<tr>";
		//echo "<td>" . $row['RouteId'] . "</td>";
		//echo "<td>" . $row['NameZh'] . "</td>";
		
       foreach ( $row as $value )
         print( "<td onclick='mark_point()'>$value</td>" );
	   echo "</tr>";
   }
   echo "</table>";
   mysql_close( $database );
?>
</body>
</html>
