<?php
session_start();

$username="root";
$password="";
$database="intmgt1";
$host="localhost";
// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
$com_name=$_SESSION['com_name'];
// Opens a connection to a MySQL server

$connection=mysqli_connect ($host, $username, $password, $database);
if (!$connection) {  die('Not connected : ' . mysqli_error());}

// Set the active MySQL database

$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error());
}

// Select all the rows in the markers table
//$ty=$_SESSION['ty'];
$m=$com_name.'_map';
$query = "SELECT * FROM $m";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  //$newnode->setAttribute("id",$row['id']);
  $newnode->setAttribute("city",$row['city']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['latitude']);
  $newnode->setAttribute("lng", $row['longitude']);
  $newnode->setAttribute("type", $row['type']);
}

echo $dom->saveXML();

?>