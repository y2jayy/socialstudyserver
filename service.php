<?php
 
// Create connection
$con=mysqli_connect("localhost","admin_user","d1preRek","flirtmobile");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$method = $_GET["method"];
$userId = $_GET["user_id"];

if ($method == "read")
{
	// This SQL statement selects ALL from the table 'Locations'
	$sql = "SELECT * FROM coordinates"
		. "JOIN users ON coordinates.user_id = users.id"
		. "WHERE coordinates.id IN (SELECT MAX(coordinates.id) FROM coordinates GROUP BY user_id)"
		. "WHERE user_id <> " . $userId;

	// Check if there are results
	if ($result = mysqli_query($con, $sql))
	{
		// If so, then create a results array and a temporary one
		// to hold the data
		$resultArray = array();
		$tempArray = array();

		// Loop through each row in the result set
		while($row = $result->fetch_object())
		{
			// Add each row into our results array
			$tempArray = $row;
			array_push($resultArray, $tempArray);
		}

		// Finally, encode the array to JSON and output the results
		echo json_encode($resultArray);
	}
}
else if ($method == "update")
{
		// This SQL statement selects ALL from the table 'Locations'
	$sql = "INSERT INTO coordinates"
		. "(latitude, longitude, user_id)"
		. "VALUES ("
			. $_GET["latitude"] . ", " . $_GET["longitude"] . ", " . $userId 
		. ")";
	mysqli_query($con, $sql);
}

// Close connections
mysqli_close($result);
mysqli_close($con);
?>