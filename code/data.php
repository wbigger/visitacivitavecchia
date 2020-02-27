<?php

$result = $_SERVER["REQUEST_METHOD"];

echo json_encode($result);
return;

$myObj = new stdClass();
$myObj->productList = array();

$servername = "visitacivitavecchia_db_1";
$username = "user";
$password = "password";
$dbname = "db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connection_error) {
    die("Connection failed: " .
        $conn->connection_error);
}

$result = $conn->query(
    "SELECT product,price FROM `products`"
);

if ($result) {
    foreach ($result as $row) {
        $prod = new stdClass();
        $prod->product = $row["product"];
        $prod->price = $row["price"];
        $myObj->productList[] = $prod;
    }
}

echo json_encode($myObj);
