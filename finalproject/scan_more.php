<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>PHP</title>
	  	<style>
		body{
			font-family: sans-serif;
	        background-color: lightyellow;
			position:relative;
			left:15%;
			width:920px;
			background-color:#FFF;
		}
		 table { background-color: lightblue;
			 border-collapse: collapse;
			 width :280px;
			 border: 1px solid gray; }
		 td    { padding: 5px; }
		 tr:nth-child(odd) { background-color: white; }
	</style>
   </head>
   <body>
<?php
	$query = "SELECT * FROM message_board ORDER BY message_id DESC ";

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
