<?php
include 'Connexion.php';

$id = $_GET['id'];

// Récupérer toutes les catégories
$sql_cat = "SELECT code, label FROM categories";
$result_cat = $conn->query($sql_cat);

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

$sql = "SELECT * FROM produits WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Update de Produit</h2>
<a href="index.php">Retour</a>

<form method="POST">
    Nom: <input type="text" name="nom" value="<?= $row['nom'] ?>" required><br><br>
    Description: <textarea name="description" required><?= $row['description'] ?></textarea><br><br>
    Quantité: <input type="number" name="quantite" value="<?= $row['quantite'] ?>" required><br><br>
    Prix: <input type="number" step="0.01" name="prix" value="<?= $row['prix'] ?>" required><br><br>
    
    Catégorie: 
    <select name="category" required>
        <?php 
        // On relance la requête car le while a déjà consommé $result_cat
        $result_cat = $conn->query($sql_cat);
        while($cat = $result_cat->fetch_assoc()): 
        ?>
            <option value="<?= $cat['code'] ?>" <?= ($cat['code'] == $row['category']) ? 'selected' : '' ?>>
                <?= $cat['label'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>
    
    <button type="submit" name="modifier">Modifier</button>
</form>