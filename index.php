<?php
include 'Connexion.php';

$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
?>

<h2>Liste Produits</h2>
<a href="ajouter.php">Ajouter</a>

<table border="1">
    <tr>
        <th>ID</th><th>Nom</th><th>Descript</th><th>Quantité</th><th>Prix</th><th>Catégorie</th><th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nom'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['quantite'] ?></td>
        <td><?= $row['prix'] ?></td>
        <td><?= $row['category'] ?></td>
        <td>
            <a href="details.php?id=<?= $row['id'] ?>">Détails</a>
            <a href="update.php?id=<?= $row['id'] ?>">Update</a>
            <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>