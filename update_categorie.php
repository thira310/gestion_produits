<?php
include 'Connexion.php';
$id = $_GET['id'];

if(isset($_POST['update'])){
    $code = $_POST['code'];
    $label = $_POST['label'];
    
    $sql = "UPDATE categories SET code = '$code', label = '$label' WHERE id = '$id'";
    if($conn->query($sql)){
        header("Location: categories.php");
        exit();
    } else {
        die("Erreur SQL: ". $conn->error);
    }
}

$result = $conn->query("SELECT * FROM categories WHERE id = '$id'");
$row = $result->fetch_assoc();
?>

<form method="POST">
    <label>Code :</label>
    <input type="text" name="code" value="<?= $row['code']?>" required>
    <br>
    <label>Label :</label>
    <input type="text" name="label" value="<?= $row['label']?>" required>
    <br>
    <button type="submit" name="update">Mettre à jour</button>
</form>