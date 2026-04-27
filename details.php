<?php
include 'Connexion.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produits WHERE id=$id");
$produit = $result->fetch_assoc();

// Récupérer le nom de la catégorie au lieu du code
$cat_result = $conn->query("SELECT label FROM categories WHERE code='{$produit['category']}'");
$cat = $cat_result->fetch_assoc();
$nom_categorie = $cat ? $cat['label'] : $produit['category'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Détails Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Détails du Produit</h2>
<a href="index.php">Retour</a>

<table>
    <tr><th>ID</th><td><?= $produit['id'] ?></td></tr>
    <tr><th>Nom</th><td><?= $produit['nom'] ?></td></tr>
    <tr><th>Description</th><td><?= $produit['description'] ?></td></tr>
    <tr><th>Quantité</th><td><?= $produit['quantite'] ?></td></tr>
    <tr><th>Prix</th><td><?= $produit['prix'] ?> FCFA</td></tr>
    <tr><th>Catégorie</th><td><?= $nom_categorie ?> (<?= $produit['category'] ?>)</td></tr>
</table>

<br>
<a href="update.php?id=<?= $produit['id'] ?>">Modifier</a>
<a href="delete.php?id=<?= $produit['id'] ?>" class="btn-delete">Supprimer</a>

</body>
</html>