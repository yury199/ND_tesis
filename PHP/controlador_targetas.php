<?php

include 'StateConnections/conexion.php';

$sql = "SELECT * FROM tabla_imgs WHERE 	titlestory LIKE '%$term%' OR genero LIKE '%$term%' OR usuario LIKE '%$term%'";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="targetas">';
    echo '<div class="img_cont" style="background-image: url('.$row['Enlace'].');">';
    echo '<p>'.$row['titlestory'].'</p>';
    echo '</div>';
    echo '<p>Genero: '.$row['genero'].'</p>';
    echo '<p>Autor: '.$row['usuario'].'</p>';
    echo '<div class="opciones">';
    echo '<a href="#">eliminar<img src="" alt=""></a>';
    echo '<a href="#">editar<img src="" alt=""></a>';
    echo '<a href="#">leer<img src="" alt=""></a>';
    echo '<a class="info" href="#" onmouseover="mostrarInfo()">Info</a>';
    echo '<div id="infoAdicional">';
    echo '<p>'.$row['Descripcion'].'</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}