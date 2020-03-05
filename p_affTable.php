<!DOCTYPE html>
<html lang="fr">
<head>
    <?php $nomTable = $_GET['nT'];?>
    <meta charset="UTF-8">
    <title>Contenue <?php echo $nomTable?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1 id="mainTitle">Contenue de la table <?php echo $nomTable?></h1>
<br />

<!--<form action="action_afficherTable.php" method="post">
    <p><input class="basePolice round-broder" style="width:800px" type="text" name="nom" /></p>
    <p><input class="round-broder basePolice" style="width:550px" type="submit" value="Voir le contenue de la table"></p>
</form>-->
</body>
</html>