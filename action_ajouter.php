<?php

function detChamps($c){
    $res = "";
    for ($i=0 ; $i<count($c)-1 ; $i++){
        $res .= "$c[$i], ";
    }
    $res .= $c[count($c)-1];

    return $res;
}

function detValues($c){
    $res = "'";

    for ($i=0 ; $i<count($c)-1 ; $i++){
        $res .= $_POST[$c[$i]];
        $res .= '\', \'';
    }

    $res .= $_POST[$c[count($c)-1]];
    $res .= "'";

    return $res;
}

$servername = "localhost";
$username = "timothe_MSP";
$password = "mdpDB=MSP21";
$tN = $_GET['tN'];

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

$chp = array();
foreach ($n as $val){
    $chp[] = $val[0];
}



$champs = detChamps($chp);
$values = detValues($chp);



$conn->query("SET FOREIGN_KEY_CHECKS=0");
$conn->query("INSERT INTO $tN($champs) VALUES ($values)");
$conn->query("SET FOREIGN_KEY_CHECKS=1");

header("Location: p_affTable.php?nT=$tN");
