<?php

$query_string = $_SERVER["QUERY_STRING"];
parse_str($query_string,$query);
$poi = $query["poi"];

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
    "SELECT * FROM `products` WHERE `name` = '". $poi ."'"
);

if ($result) {
    foreach ($result as $row) {
        $prod = new stdClass();
        $prod->name = $row["name"];
        $prod->name_subtitle = $row["name_subtitle"];
        $prod->video_url = $row["video_url"];
        $prod->img1_url = $row["img1_url"];
        $prod->img2_url = $row["img2_url"];
        $prod->img3_url = $row["img3_url"];
        $prod->img4_url = $row["img4_url"];
        $prod->text1_url = $row["text1_url"];
        $prod->text2_url = $row["text2_url"];
        $prod->text3_url = $row["text3_url"];
        $prod->text4_url = $row["text4_url"];
        $myObj->productList[] = $prod;
    }
}

header('Content-Type: application/json');
echo json_encode($myObj);
