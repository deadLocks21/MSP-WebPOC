<?php
$servername = "localhost";
$username = "timothe_MSP";
$password = "mdpDB=MSP21";
$nomTable = $_POST['nom'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=timothe_MSP", $username, $password);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}



$results = $conn->query("SHOW TABLES FROM $username");

$tables = array();
while($row = $results->fetch()){
    $tables[] = $row[0];
    echo $row[0];
}

if(in_array($nomTable, $tables)){
    header("Location: p_affTable.php?nT=$nomTable");
}
else
    header("Location: erreur_nomTable.php?tN=$nomTable");

exit();