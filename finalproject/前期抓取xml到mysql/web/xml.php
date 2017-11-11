<?php
$servername = "localhost";
$username = "root";
$password = "wwl_123";
$dbname = "goxml";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*$sql = "INSERT INTO web (BusID, ProviderID, DutyStatus,BusStatus,RouteID,GoBack,Longitude,Latitude,Speed,Azimuth,DataTime,ledstate,sections)
VALUES ('$data->BusData[$i]['BusID']', 'Doe', 'john@example.com','','','','','','','','','','')";
*/

$aq = $_POST["aq"];
header("Access-Control-Allow-Origin: *");
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
$url="bus.xml";
$xml=simplexml_load_file($url) or die("Error: Cannot create object");

foreach($xml->children() as $data) { 
	//echo $data->count();
	//echo "<br>"; 
	for($i=0;$i<$data->count();$i++)
	{
		$BusID[$i]=$data->BusData[$i]['BusID'];
		$ProviderID[$i]=$data->BusData[$i]['ProviderID'];
		$DutyStatus[$i]=$data->BusData[$i]['DutyStatus'];
		$BusStatus[$i]=$data->BusData[$i]['BusStatus'];
		$RouteID[$i]=$data->BusData[$i]['RouteID'];
		$GoBack[$i]=$data->BusData[$i]['GoBack'];
		$Longitude[$i]=$data->BusData[$i]['Longitude'];
		$Latitude[$i]=$data->BusData[$i]['Latitude'];
		$Speed[$i]=$data->BusData[$i]['Speed'];
		$Azimuth[$i]=$data->BusData[$i]['Azimuth'];
		$DataTime[$i]=$data->BusData[$i]['DataTime'];
		$ledstate[$i]=$data->BusData[$i]['ledstate'];
		$sections[$i]=$data->BusData[$i]['sections'];
		$sql = "INSERT INTO web (BusID, ProviderID, DutyStatus,BusStatus,RouteID,GoBack,Longitude,Latitude,Speed,Azimuth,DataTime,ledstate,sections)
VALUES ('$BusID[$i]', '$ProviderID[$i]', '$DutyStatus[$i]','$BusStatus[$i]','$RouteID[$i]','$GoBack[$i]','$Longitude[$i]','$Latitude[$i]','$Speed[$i]','$Azimuth[$i]','$DataTime[$i]','$ledstate[$i]','$sections[$i]')";
		if ($conn->multi_query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		/*echo "BusID=".$data->BusData[$i]['BusID']." ";
		echo "ProviderID=".$data->BusData[$i]['ProviderID']." ";
		echo "DutyStatus=".$data->BusData[$i]['DutyStatus']." ";
		echo "BusStatus=".$data->BusData[$i]['BusStatus']." ";
		echo "RouteID=".$data->BusData[$i]['RouteID']." ";
		echo "GoBack=".$data->BusData[$i]['GoBack']." ";
		echo "Longitude=".$data->BusData[$i]['Longitude']." ";
		echo "Latitude=".$data->BusData[$i]['Latitude']." ";
		echo "Speed=".$data->BusData[$i]['Speed']." ";
		echo "Azimuth=".$data->BusData[$i]['Azimuth']." ";
		echo "DataTime=".$data->BusData[$i]['DataTime']." ";
		echo "ledstate=".$data->BusData[$i]['ledstate']." ";
		echo "sections=".$data->BusData[$i]['sections']." ";
		echo "<br>";*/ 
	}
} 

$conn->close();
?>
