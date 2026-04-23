<?php
include 'Connexion.php';

$id = $_GET['id'];

// Si le formulaire est soumis
if(isset($_POST['modifier'])){
    $code = $_POST['code'];
    $label = $_POST['label'];

    $sql = "UPDATE categories SET 
            code='$code', 
            label='$label' 
            WHERE id=$id";
    
    if($conn->query($sql) === TRUE){
        header("Location: categories.php");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }
}

// Récupérer les infos actuelles
$sql = "SELECT * FROM categories WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Update de Catégorie</h2>
<a href="categories.php">Retour</a>

<form method="POST">
    Code: <input type="text" name="code" value="<?= $row['code'] ?>" required><br><br>
    Label: <input type="text" name="label" value="<?= $row['label'] ?>" required><br><br>
    <button type="submit" name="modifier">Modifier</button>
</form>