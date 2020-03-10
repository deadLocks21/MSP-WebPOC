<?php
$tN = $_GET['nT'];





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

function printForm(){
    $c = dbCon();
    $tN = $_GET['nT'];
    $nC = recupNomCol($c, $tN);
    $res = "";

    foreach ($nC as $item){
        $res = $res . "
                <p class=\"basePolice round-broder\">$item :&nbsp<input class=\"round-broder\" style=\"width:800px;font-size: 1em\" type=\"text\" name=\"$item\" /></p>";
    }

    $res .= "
                <p><input class=\"round-broder basePolice\" style=\"width:550px\" type=\"submit\" value=\"Ajouter les données\"></p>";

    return $res;
}







$form = printForm();

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
            <h1 id=\"mainTitle\">Ajouter un élement à la table $tN</h1>
            
            <br />
            <form action=\"action_ajouter.php?tN=$tN\" method=\"post\">
            
                $form
                
            </form>
        </div>
    </body>
</html>";