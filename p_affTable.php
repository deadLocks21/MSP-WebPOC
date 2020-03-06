<?php
$nomTable = $_GET['nT'];

function invokeStructureDeb($nT){
    echo "<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <title>Contenue $nT</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">
    </head>

    <body>
        <h1 id=\"mainTitle\">Contenue de la table $nT</h1>
        <br />";
}

function invokeStructureFin(){
    echo "        </div>\n    </body>\n</html>";
}

function invokeDebList(){
    echo "            <a>
                <ul class=\"center\">";
}

function invokeFinList(){
    echo "                </ul>
            </a>
";
}

function invokeLi($tC, $el){
    echo "                    <li class=\"basePolice\" style=\"width:$tC%;\">$el</li>\n";
}

function dbCon() {
    $servername = "localhost";
    $username = "timothe_MSP";
    $password = "mdpDB=MSP21";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=timothe_MSP", $username, $password);
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}

function detTailleCol($conn, $nomTable){
    $results = $conn->query("SELECT count(*) FROM information_schema.COLUMNS WHERE table_schema = 'timothe_MSP' AND table_name='$nomTable'");

    $tables = array();
    while($row = $results->fetch()){
        $tables[] = $row[0];
    }

    $nbCol = $tables[0];

    return 90/$nbCol;
}

function recupData($conn, $nomTable) {
    $results = $conn->query("SELECT * FROM $nomTable");

    $n = $results->fetchAll();

    $res = array();
    foreach ($n as $val){
        $res[] = $val;
    }

    return $res;
}


$conn = dbCon();
$tailleCol = detTailleCol($conn, $nomTable);


invokeStructureDeb($nomTable);
echo "\n        <div class=\"results round-broder\">\n";

$ctnCol = recupData($conn, $nomTable);

foreach ($ctnCol as $ctn) {
    invokeDebList();
    for($i=0; $i<count($ctn); $i++){
        invokeLi($tailleCol, $ctn[$i]);
    }
    invokeFinList();
}

invokeStructureFin();
