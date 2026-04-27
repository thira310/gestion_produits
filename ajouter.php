<?php
include 'Connexion.php';

if(isset($_POST['ajouter'])){
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $category = $_POST['category'];

    $sql = "INSERT INTO produits (nom, description, quantite, prix, category) 
            VALUES ('$nom', '$description', '$quantite', '$prix', '$category')";

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
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Ajout de Produits</h2>
<a href="index.php">Retour</a>

<form method="POST">
    Nom: <input type="text" name="nom" required><br><br>
    Description: <textarea name="description"></textarea><br><br>
    Quantité: <input type="number" name="quantite" required><br><br>
    Prix: <input type="number" step="0.01" name="prix" required><br><br>
    Catégorie:
    <select name="category" required>
        <?php 
        $cat = $conn->query("SELECT * FROM categories");
        while($c = $cat->fetch_assoc()){ 
            echo "<option value='{$c['code']}'>{$c['label']}</option>";
        }
        ?>
    </select><br><br>
    
    <button type="submit" name="ajouter">Ajouter</button>
</form>

</body>
</html>