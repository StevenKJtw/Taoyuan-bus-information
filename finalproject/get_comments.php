<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>PHP</title>
   </head>
   <body>
<?php
	$query = "SELECT * FROM message_board ORDER BY message_id DESC limit 3";

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
	<th>樓層</th>
	<th>用戶</th>
	<th>評論</th>
	</tr>";
   while ( $row = mysql_fetch_row( $result ) )
   {
	   echo "<tr>";		
       foreach ( $row as $value )
         print( "<td >$value</td>" );
	   echo "</tr>";
   }
   echo "</table>";
   mysql_close( $database );
?>
</body>
</html>
