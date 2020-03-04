<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>AppTech</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
    <?php
/*        $bdd = new PDO('mysql:host=localhost;dbname=timothe_WordPress;charset=utf8', 'timothe', 'GXuJ5vPna');
        $reponse = $bdd->query('SELECT * FROM wp_users;');
    */?>
        <h1 id="mainTitle">Connection à la DataBase MySQL</h1>
    <br />

        <form action="action.php" method="post">
            <p><input class="basePolice round-broder" style="width:800px" type="text" name="nom" /></p>
            <p><input class="round-broder basePolice" style="width:550px" type="submit" value="Voir le contenue de la table"></p>
        </form>
    </body>
</html>