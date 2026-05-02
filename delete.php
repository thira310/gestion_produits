<?php
include 'Connexion.php';
$id = $_GET['id'];

// Option 1 : Supprimer la catégorie même si des produits l'utilisent
// On met d'abord les produits à NULL pour éviter l'erreur de clé étrangère
$conn->query("UPDATE produits SET categorie = NULL WHERE categorie = (SELECT code FROM categories WHERE id = $id)");

$sql = "DELETE FROM categories WHERE id = $id";
if($conn->query($sql)){
    header("Location: categories.php");
    exit();
} else {
    die("Erreur SQL: " . $conn->error);
}
?>