<?php
include 'Connexion.php';

$id = $_GET['id'];

// Si le formulaire est soumis
if(isset($_POST['modifier'])){
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $category = $_POST['category'];

    $sql = "UPDATE produits SET 
            nom='$nom', 
            description='$description', 
            quantite=$quantite, 
            prix=$prix, 
            category='$category' 
            WHERE id=$id";
    
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }
}

// Récupérer les infos actuelles du produit
$sql = "SELECT * FROM produits WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Update de Produit</h2>
<a href="index.php">Retour</a>

<form method="POST">
    Nom: <input type="text" name="nom" value="<?= $row['nom'] ?>" required><br><br>
    Description: <textarea name="description"><?= $row['description'] ?></textarea><br><br>
    Quantité: <input type="number" name="quantite" value="<?= $row['quantite'] ?>" required><br><br>
    Prix: <input type="number" name="prix" value="<?= $row['prix'] ?>" required><br><br>
    Catégorie: 
    <select name="category" required>
        <option value="Sucrerie" <?= $row['category'] == 'Sucrerie' ? 'selected' : '' ?>>Sucrerie</option>
        <option value="Alcool" <?= $row['category'] == 'Alcool' ? 'selected' : '' ?>>Alcool</option>
    </select><br><br>
    <button type="submit" name="modifier">Modifier</button>
</form>