<?php
  // Comprueba si se ha enviado el formulario de creación
  if (isset($_POST['create'])) {
    // Aquí puedes procesar los datos enviados en el formulario de creación
    // y guardarlos en tu base de datos
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    // Procesa los datos y guarda el registro en la base de datos
    // ...
  }
  
  // Comprueba si se ha enviado el formulario de edición
  if (isset($_POST['edit'])) {
    // Aquí puedes procesar los datos enviados en el formulario de edición
    // y actualizar el registro correspondiente en tu base de datos
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    // Procesa los datos y actualiza el registro en la base de datos
    // ...
  }
  
  // Comprueba si se ha enviado el formulario de eliminación
  if (isset($_POST['delete'])) {
    // Aquí puedes procesar los datos enviados en el formulario de eliminación
    // y eliminar el registro correspondiente de tu base de datos
    $id = $_POST['id'];
    // Procesa los datos y elimina el registro de la base de datos
    // ...
  }
  ?>