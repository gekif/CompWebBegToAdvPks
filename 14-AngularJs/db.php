<?php
header("Access-Control-Allow-Origin: '");
header("Content-Type: application/json; charset=UTF-8");
$host = 'localhost';
$username = 'root';
$password = 'admin';
$database = 'learn_angular';

$conn = mysqli_connect($host, $username, $password, $database);

$sql = "SELECT * FROM learn_angular.angular";
$run = mysqli_query($conn, $sql);
$j_res = "";

while ($res = mysqli_fetch_assoc($run)) {
    if ($j_res != "") {$j_res .= ",";}
    $j_res .= '{"Name":"' . $res['name'] . '",';
    $j_res .= '"City":"' . $res['city'] . '",';
    $j_res .= '"Country":"' . $res['country'] . '"}';
}

$j_res = '{"person":['.$j_res.']}';
echo $j_res;
