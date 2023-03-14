<?php
include('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo "Er is een verbinging gemaakt met de mysql server";
    } else {
        echo "Er is een interne server error opgetreden";
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT Id
               ,Naam
               ,NettoWaarde
               ,Land
               ,Mobiel
               ,Leeftijd
        FROM mvc-oop-toets";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);

$tableRows = "";

foreach ($result as $info) {
    $tableRows .= "<tr>
                        <td>$row->Id</td>
                        <td>$row->Naam</td>
                        <td>$row->NettoWaarde</td>
                        <td>$row->Land</td>
                        <td>$row->Mobiel</td>
                        <td>$row->Leeftijd</td>
                    </tr>";
}
?>
<a href="index.php">
</a>
<br><br>
<table border='1'>
    <thead>
        <th>Naam</th>
        <th>NettoWaarde</th>
        <th>Land</th>
        <th>Mobiel</th>
        <th>Leeftijd</th>
    </thead>
    <tbody>
        <?php echo $tableRows; ?>
    </tbody>
</table>