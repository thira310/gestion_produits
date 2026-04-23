<?php
include 'Connexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM categories WHERE id = $id";

if($conn->query($sql) === TRUE){
    header("Location: categories.php");
    exit();
} else {
    echo "Erreur lors de la suppression: " . $conn->error;
}
?>