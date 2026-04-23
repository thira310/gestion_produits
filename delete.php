<?php
include 'Connexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM produits WHERE id = $id";

if($conn->query($sql) === TRUE){
    header("Location: index.php");
    exit();
} else {
    echo "Erreur lors de la suppression: " . $conn->error;
}
?>