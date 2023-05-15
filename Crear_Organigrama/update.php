<?php
// Obtener los datos enviados por el formulario
$id = $_POST['id'];
$user = $_POST['user'];
$imgUrl = $_POST['imgUrl'];

// Actualizar la información en la base de datos
try {
    $dbh = new PDO("mysql:host=localhost;dbname=login", "root", "");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("UPDATE users SET user = :user, imgUrl = :imgUrl WHERE id = :id");
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':imgUrl', $imgUrl);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $dbh = null;
    echo "Los datos se actualizaron correctamente";
} catch (PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
?>
