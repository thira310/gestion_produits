<?php
include 'Connexion.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produits WHERE id=$id");
$produit = $result->fetch_assoc();

if(isset($_POST['modifier'])){
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $category = $_POST['category'];

    $sql = "UPDATE produits SET 
            nom='$nom', 
            description='$description', 
            quantite='$quantite', 
            prix='$prix', 
            category='$category' 
            WHERE id=$id";

    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Modifier le Produit</h2>
<a href="index.php" class="btn-back">Retour</a>

<form method="POST">
    Nom: <input type="text" name="nom" value="<?= $produit['nom'] ?>" required><br><br>
    Description: <textarea name="description"><?= $produit['description'] ?></textarea><br><br>
    Quantité: <input type="number" name="quantite" value="<?= $produit['quantite'] ?>" required><br><br>
    Prix: <input type="number" step="0.01" name="prix" value="<?= $produit['prix'] ?>" required><br><br>
    Catégorie:
    <select name="category" required>
        <?php 
        $cat = $conn->query("SELECT * FROM categories");
        while($c = $cat->fetch_assoc()){ 
            $selected = $c['code'] == $produit['category'] ? 'selected' : '';
            echo "<option value='{$c['code']}' $selected>{$c['label']}</option>";
        }
        ?>
    </select><br><br>
    
    <button type="submit" name="modifier" class="btn-update">Modifier</button>
</form>

</body>
</html>