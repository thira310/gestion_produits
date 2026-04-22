<?php
include 'Connexion.php';

if(isset($_POST['ajouter'])){
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $category = $_POST['category'];

    $sql = "INSERT INTO produits (nom, description, quantite, prix, category) 
            VALUES ('$nom', '$description', $quantite, $prix, '$category')";
    
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }
}
?>

<h2>Ajout de Produit</h2>
<a href="index.php">Retour</a>

<form method="POST">
    Nom: <input type="text" name="nom" required><br><br>
    Description: <textarea name="description"></textarea><br><br>
    Quantité: <input type="number" name="quantite" required><br><br>
    Prix: <input type="number" name="prix" required><br><br>
    Catégorie: 
    <select name="category" required>
        <option value="Sucrerie">Sucrerie</option>
        <option value="Alcool">Alcool</option>
    </select><br><br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>