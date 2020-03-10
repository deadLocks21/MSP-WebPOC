<?php

function detValues($c){
    $res = "";

    for ($i=0 ; $i<count($c)-1 ; $i++){
        $res .= $c[$i]."='".$_POST[$c[$i]]."', ";
    }

    $res .= $c[count($c)-1]."='".$_POST[$c[count($c)-1]]."'";

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



$values = detValues($chp);
$ordreSQL = "UPDATE $tN SET $values WHERE $chp[0]=" . $_POST[$chp[0]];



$conn->query("SET FOREIGN_KEY_CHECKS=0");
$conn->query($ordreSQL);
$conn->query("SET FOREIGN_KEY_CHECKS=1");

header("Location: p_affTable.php?nT=$tN");
