<?php
include("../StateConnections/conexion.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';

$sql = "SELECT * FROM historietas WHERE 1=1";

if (!empty($search)) {
    $sql .= " AND (usuario LIKE '%$search%' OR titlestory LIKE '%$search%')";
}

if (!empty($genre)) {
    $sql .= " AND genero = '$genre'";
}

$result = mysqli_query($conexion, $sql);

// Generar los resultados de búsqueda en HTML
$output = '';
while ($row = mysqli_fetch_assoc($result)) {
    
    $output .= '<div class="card">';
    $output .= '<div class="image">';
    $output .= '<img src="' . $row['imgUrl'] . '" alt="">';
    $output .= '</div>';
    $output .= '<div class="caption">';
    $output .= '<p class="titulo">Título: ' . $row['titlestory'] . '</p>';
    $output .= '<p class="autor">Autor: ' . $row['usuario'] . '</p>';
    $output .= '<p class="genero">Género: ' . $row['genero'] . '</p>';
    $output .= '</div>';
    $output .= '<a href="./readStates/reiniciar.php?titulo=' . urlencode($row['titlestory']) . '&autor=' . urlencode($row['usuario']) . '">Enlace</a>';
    $output .= '</div>';
}

// Devolver los resultados de búsqueda
echo $output;
?>

