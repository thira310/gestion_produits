<?php
include 'Connexion.php';

// 1. AJOUTER catégorie
if(isset($_POST['ajouter_cat'])){
    $code = $_POST['code'];
    $label = $_POST['label'];
    $conn->query("INSERT INTO categories (code, label) VALUES ('$code', '$label')");
    header("Location: categories.php");
    exit();
}

// 2. SUPPRIMER catégorie
if(isset($_GET['delete_cat'])){
    $code = $_GET['delete_cat'];
    $conn->query("DELETE FROM categories WHERE code='$code'");
    header("Location: categories.php");
    exit();
}

// 3. MODIFIER catégorie
if(isset($_POST['modifier_cat'])){
    $ancien_code = $_POST['ancien_code'];
    $code = $_POST['code'];
    $label = $_POST['label'];
    $conn->query("UPDATE categories SET code='$code', label='$label' WHERE code='$ancien_code'");
    header("Location: categories.php");
    exit();
}

// Si on clique sur "Modifier", on récupère la catégorie
$edit_cat = null;
if(isset($_GET['edit_cat'])){
    $code_edit = $_GET['edit_cat'];
    $result_edit = $conn->query("SELECT * FROM categories WHERE code='$code_edit'");
    $edit_cat = $result_edit->fetch_assoc();
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
<a href="index.php" class="btn-back">Retour aux Produits</a>

<div class="search-bar">
    <form method="POST">
        <input type="hidden" name="ancien_code" value="<?= $edit_cat['code'] ?? '' ?>">
        <input type="text" name="code" placeholder="Code ex: BS001" value="<?= $edit_cat['code'] ?? '' ?>" required>
        <input type="text" name="label" placeholder="Label ex: Sucrerie" value="<?= $edit_cat['label'] ?? '' ?>" required>
        
        <?php if($edit_cat): ?>
            <button type="submit" name="modifier_cat" class="btn-update">Modifier Catégorie</button>
            <a href="categories.php" class="btn-back">Annuler</a>
        <?php else: ?>
            <button type="submit" name="ajouter_cat" class="btn-add">Ajouter Catégorie</button>
        <?php endif; ?>
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
            <a href="categories.php?edit_cat=<?= $row['code'] ?>" class="btn-update">Modifier</a>
            <a href="categories.php?delete_cat=<?= $row['code'] ?>" class="btn-delete" onclick="return confirm('Supprimer cette catégorie ? Attention : les produits liés auront un code inexistant !')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>