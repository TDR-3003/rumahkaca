<?php
$servername 	= "localhost";
$username 	    = "root";
$password 	    = "root";
$db		        = "iotsiscer";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);
    $rows = [];
    if($num > 0):
        while ($row = mysqli_fetch_assoc($result)):
            $rows[] = $row;
        endwhile;
    endif;
    return $rows;
    
}

?>