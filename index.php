<?php
include 'Connexion.php';

// Gestion de la recherche
$recherche = "";
if(isset($_GET['recherche'])){
    $recherche = $_GET['recherche'];
    $sql = "SELECT * FROM produits WHERE nom LIKE '%$recherche%'";
} else {
    $sql = "SELECT * FROM produits";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion Produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Liste Produits</h2>
<a href="ajouter.php">Ajouter Produit</a>
<a href="categories.php">Gérer Catégories</a>

<!-- Barre de recherche -->
<form method="GET">
    <input type="text" name="recherche" placeholder="Rechercher par nom..." value="<?= $recherche ?>">
    <button type="submit">Rechercher</button>
    <a href="index.php">Reset</a>
</form>

<table border="1">
    <tr>
        <th>ID</th><th>Nom</th><th>Description</th><th>Quantité</th><th>Prix</th><th>Catégorie</th><th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
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
    <?php } ?>
</table>

</body>
</html>