<?php
include 'Connexion.php';

if(isset($_POST['ajouter'])){
    $code = $_POST['code'];
    $label = $_POST['label'];

    $sql = "INSERT INTO categories (code, label) VALUES ('$code', '$label')";
    
    if($conn->query($sql) === TRUE){
        header("Location: categories.php");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }
}
?>

<h2>Ajout de Catégorie</h2>
<a href="categories.php">Retour</a>

<form method="POST">
    Code: <input type="text" name="code" placeholder="Ex: JU001" required><br><br>
    Label: <input type="text" name="label" placeholder="Ex: Jus de fruit" required><br><br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>