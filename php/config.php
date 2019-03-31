 <?php

// Get Credentials
$servername = "localhost";
require('/var/php/creds.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function databaseConnOpen(){
  include('/var/php/creds.php');
  $conn = mysqli_connect($servername, $username, $password, $database);
  return $conn;
}
?>

