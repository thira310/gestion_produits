<?php
include 'Connexion.php';

// Ajouter catégorie
if(isset($_POST['ajouter_cat'])){
    $code = $_POST['code'];
    $label = $_POST['label'];
    $conn->query("INSERT INTO categories (code, label) VALUES ('$code', '$label')");
    header("Location: categories.php");
    exit();
}

// Supprimer catégorie
if(isset($_GET['delete_cat'])){
    $code = $_GET['delete_cat'];
    $conn->query("DELETE FROM categories WHERE code='$code'");
    header("Location: categories.php");
    exit();
}

$result = $conn->query("SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gérer Catégories</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Gérer les Catégories</h2>
<a href="index.php">Retour aux Produits</a>

<div class="search-bar">
    <form method="POST">
        <input type="text" name="code" placeholder="Code ex: BS001" required>
        <input type="text" name="label" placeholder="Label ex: Sucrerie" required>
        <button type="submit" name="ajouter_cat">Ajouter Catégorie</button>
    </form>
</div>

<table>
    <tr>
        <th>Code</th><th>Label</th><th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['code'] ?></td>
        <td><?= $row['label'] ?></td>
        <td>
            <a href="categories.php?delete_cat=<?= $row['code'] ?>" class="btn-delete" onclick="return confirm('Supprimer cette catégorie ?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>