<?php

$myObj = new stdClass();
$myObj->productList =
 array(new stdClass(),new stdClass());

$myObj->productList[0]->product = 
 "Forte Michelangelo";
$myObj->productList[0]->price =
 0;
$myObj->productList[1]->product = 
 "Porto Traiano";
$myObj->productList[1]->price =
 12;


$servername = "visitacivitavecchia_db_1";
$username = "user";
$password = "password";
$dbname = "db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connection_error) {
    die(
        "Connection failed: " . 
        $conn->connection_error);
}

$result = $conn->query(
    "SELECT product,price,id FROM `products`");

if ($result) {
    foreach($result as $row) {

    }
}

echo json_encode($myObj);

?>