<?php
include 'Connexion.php';
$code = $_GET['id'];

// Récupérer la catégorie actuelle
$sql = "SELECT * FROM categories WHERE code = '$code'";
$result = $conn->query($sql);
$categorie = $result->fetch_assoc();

if(isset($_POST['update'])){
    $new_code = $_POST['code'];
    $label = $_POST['label'];

    // On commence une transaction pour éviter les erreurs à moitié
    $conn->begin_transaction();

    // 1. Update la catégorie elle-même
    $sql1 = "UPDATE categories SET code='$new_code', label='$label' WHERE code='$code'";
    $conn->query($sql1);

    // 2. Update tous les produits qui utilisent l'ancien code
    $sql2 = "UPDATE produits SET categorie='$new_code' WHERE categorie='$code'";
    $conn->query($sql2);

    // 3. Si tout est ok, on valide
    $conn->commit();
    
    header("Location: categories.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier Catégorie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier Catégorie</h1>
    <form method="POST">
        <input type="text" name="code" value="<?= $categorie['code'] ?>" required>
        <input type="text" name="label" value="<?= $categorie['label'] ?>" required>
        <button type="submit" name="update" class="btn-action btn-update">Mettre à jour</button>
        <a href="categories.php" class="btn-action btn-details">Annuler</a>
    </form>
</body>
</html>