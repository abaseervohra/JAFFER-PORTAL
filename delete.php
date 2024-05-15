<?php
	session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 1);
	if(!isset($_SESSION['loggedin']) || !isset($_SESSION['email'])){
		header("Location: login.php"); // Redirect to login page
        exit();
	}
?>

<?php
include "connection.php";
$id = $_GET["ID"];
$sql = "DELETE FROM `jobs` WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}