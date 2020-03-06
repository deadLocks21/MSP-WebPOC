<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AppTech</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1 id="mainTitle">Choississez la table que vous voulez voir.</h1>
    <br />

        <form action="action_afficherTable.php" method="post">
            <p><input class="basePolice round-broder" style="width:800px" type="text" name="nom" /></p>
            <p><input class="round-broder basePolice" style="width:550px" type="submit" value="Voir le contenue de la table"></p>
        </form>
    </body>
</html>