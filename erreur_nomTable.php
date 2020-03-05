<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AppTech</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php ?>
<h1 id="mainTitle">Connection à la DataBase MySQL</h1>
<br />

<form action="action_afficherTable.php" method="post">
    <p><input class="basePolice round-broder" style="width:800px" type="text" name="nom" /></p>
    <p class="color-red basePolice">La table <span style="font-weight: bold"><?php if(isset($_GET['tN'])) echo $_GET['tN']; else echo 'TableName'; ?></span> n'existe pas dans la base de données ...</p>
    <p><input class="round-broder basePolice" style="width:550px" type="submit" value="Voir le contenue de la table"></p>
</form>
</body>
</html>