<?php
$tN = $_GET['tN'];
$id = $_GET['id'];

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

function recupNomCol($conn, $nomTable) {
    $results = $conn->query("SHOW COLUMNS FROM $nomTable");

    $n = $results->fetchAll();

    $res = array();
    foreach ($n as $val){
        $res[] = $val[0];
    }

    return $res;
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

function printForm(){
    $c = dbCon();
    $tN = $_GET['tN'];
    $id = $_GET['id'];
    $nC = recupNomCol($c, $tN);
    $res = "";
    $d = recupData($c, $tN)[$id];

    for($i = 0 ; $i < count($nC); $i++){
        $res = $res . "
                <p class=\"basePolice round-broder\">$nC[$i] :&nbsp<input class=\"round-broder\" style=\"width:800px;font-size: 1em\" type=\"text\" name=\"$nC[$i]\" value=\"$d[$i]\" /></p>";
    }

    $res .= "
                <p><input class=\"round-broder basePolice\" style=\"width:550px\" type=\"submit\" value=\"Modifier les données\"></p>";

    return $res;
}

function recupID(){
    $c = dbCon();
    $tN = $_GET['tN'];
    $id = $_GET['id'];
    $nC = recupNomCol($c, $tN);
    $d = recupData($c, $tN)[$id];

    return $d[$nC[0]];
}







$form = printForm();
$leId = recupID();

echo "<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <title>Contenue $tN</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">
    </head>

    <body>
        <a href='p_affTable.php?nT=$tN' class=\"return\">Retour</a>
        <div class=\"center\">
            <h1 id=\"mainTitle\">Modifier un élement de la table $tN</h1>

            <br />
            <form action=\"action_modifier.php\" method=\"post\">
            
                $form

            </form>
            
            <a class=\"basePolice button\"href='action_supprimer.php?tN=$tN&id=$leId' style=\"background-color: #CCCCCC;\">Supprimer l'élement</a>
        </div>
    </body>
</html>";