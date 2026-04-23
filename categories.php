<?php
include 'Connexion.php';
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<h2>Liste Catégories</h2>
<a href="index.php">Produits</a> | 
<a href="ajouter_categorie.php">Ajouter Catégorie</a>

<table border="1">
    <tr>
        <th>ID</th><th>code</th><th>label</th><th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['code'] ?></td>
        <td><?= $row['label'] ?></td>
        <td>
            <a href="update_categorie.php?id=<?= $row['id'] ?>">Update</a>
            <a href="delete_categorie.php?id=<?= $row['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>