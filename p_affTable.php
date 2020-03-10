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
        <a href='index.php' class=\"return\">Retour</a>
        <div class=\"center\">
            <h1 id=\"mainTitle\">Contenu de la table $nT</h1>
            <br />
            <a class=\"basePolice button\" href=\"p_ajouter.php?nT=$nT\" style='background-color: #CCCCCC;'>Ajouter une entrée</a>
            <br />";

}

function invokeStructureFin(){
    echo "\n            </div>\n        </div>\n    </body>\n</html>";
}

function invokeDebList($i, $tN){
    if ($i%2 == 0){
        echo "\n                <a href=\"p_modifSuppr.php?tN=$tN&id=$i\">
                    <ul class=\"center pair\">\n";
    }
    else {
        echo "\n                <a href=\"p_modifSuppr.php?tN=$tN&id=$i\">
                    <ul class=\"center impair\">\n";
    }
}

function invokeFinList(){
    echo "                    </ul>
                </a>";
}

function invokeLi($tC, $el){
//    echo "                        <li class=\"basePolice\" style=\"width:$tC%;\">$el</li>\n";
    echo "<li class=\"basePolice\" style=\"width:$tC%;\">$el</li>";
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
echo "\n\n            <div class=\"results round-broder\">";

$ctnCol = recupData($conn, $nomTable);
$conteur = 0;

foreach ($ctnCol as $ctn) {
    invokeDebList($conteur, $nomTable);
    for($i=0; $i<count($ctn)/2; $i++){
        invokeLi($tailleCol, $ctn[$i]);
    }
    invokeFinList();
    $conteur += 1;
}

invokeStructureFin();
