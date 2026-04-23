<?php
include 'Connexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM produits WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Détail de Produit</h2>
<a href="index.php">Retour</a>

<table border="1">
    <tr>
        <th>ID</th>
        <td><?= $row['id'] ?></td>
    </tr>
    <tr>
        <th>Nom</th>
        <td><?= $row['nom'] ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?= $row['description'] ?></td>
    </tr>
    <tr>
        <th>Quantité</th>
        <td><?= $row['quantite'] ?></td>
    </tr>
    <tr>
        <th>Prix</th>
        <td><?= $row['prix'] ?></td>
    </tr>
    <tr>
        <th>Catégorie</th>
        <td><?= $row['category'] ?></td>
    </tr>
</table>

<br>
<a href="update.php?id=<?= $row['id'] ?>">Modifier</a>
<a href="delete.php?id=<?= $row['id'] ?>">Supprimer</a>