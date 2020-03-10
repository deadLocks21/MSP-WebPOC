<?php
$tN = $_GET['tN'];
$id = $_GET['id'];

$servername = "localhost";
$username = "timothe_MSP";
$password = "mdpDB=MSP21";

try {
    $conn = new PDO("mysql:host=$servername;dbname=timothe_MSP", $username, $password);
    echo "Connected";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$results = $conn->query("SHOW COLUMNS FROM $tN");

$n = $results->fetchAll();

$res = array();
foreach ($n as $val){
    $res[] = $val[0];
}

//$id += 1;

$conn->query("SET FOREIGN_KEY_CHECKS=0");
$conn->query("DELETE FROM $tN WHERE $res[0]=$id");
$conn->query("SET FOREIGN_KEY_CHECKS=1");

//echo "DELETE FROM $tN WHERE $res[0]=$id";
header("Location: p_affTable.php?nT=$tN");

