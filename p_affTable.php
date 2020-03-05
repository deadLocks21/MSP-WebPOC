<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
$nomTable = $_GET['nT'];
$servername = "localhost";
$username = "timothe_MSP";
$password = "mdpDB=MSP21";

try {
    $conn = new PDO("mysql:host=$servername;dbname=timothe_MSP", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}?>
<meta charset="UTF-8">
<title>Contenue <?php echo $nomTable?></title>
<link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1 id="mainTitle">Contenue de la table <?php echo $nomTable?></h1>
        <br />

    </body>
</html>