<?php
$tN = $_GET['nT'];

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
            <form action=\"action_ajouter.php\" method=\"post\">
            
            </form>
        </div>
    </body>
</html>";