<?php
if(isset($_POST["registrar"])){

	// Obtener las entradas del formulario
	$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
	$correo = mysqli_real_escape_string($conexion,$_POST['correo']);
	$usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
	$password = mysqli_real_escape_string($conexion,$_POST['password']);
	$password_encriptada = sha1($password);
	$password2 = mysqli_real_escape_string($conexion,$_POST['password2']);

    // Validar que la contraseña sea segura
    if(strlen($password) < 8 || !preg_match("#[0-9]+#", $password) || !preg_match("#[a-z]+#", $password) || !preg_match("#[A-Z]+#", $password) || !preg_match("#\W+#", $password)){
        echo "<script>document.getElementById('password').classList.add('error');</script>";
        echo "<script>document.getElementById('password2').classList.add('error');</script>";
        
        echo "<div class='alert-danger'>La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número, un carácter especial y una longitud mínima de 8 caracteres</div>";
    } else if($password != $password2) { // Validar que las contraseñas coincidan
        echo "<script>document.getElementById('password').classList.add('error');</script>";
        echo "<script>document.getElementById('password2').classList.add('error');</script>";
        echo "<div class='alert-danger'>Las contraseñas no coinciden</div>";   
    } else {
        // Validar que el correo no exista en la base de datos
        $sqlcorreo = "SELECT id FROM usuarios WHERE correo='$correo'";
        $resultadocorreo = $conexion->query($sqlcorreo);
        if($resultadocorreo->num_rows > 0){
            echo "<script>document.getElementById('correo').classList.add('error');</script>";
            echo "<div class='alert-danger'>El correo ya está registrado</div>";
             
        } else {
            // Validar que el usuario no exista en la base de datos
            $sqluser = "SELECT id FROM usuarios WHERE nombreusuario='$usuario'";
            $resultadouser = $conexion->query($sqluser);
            if($resultadouser->num_rows > 0){
                echo "<script>document.getElementById('usuario').classList.add('error');</script>";  
                echo "<div class='alert-danger'>El usuario ya existe</div>"; 
                
            } else {
                // Validar si el correo electrónico es válido
                if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    $domain = explode('@', $correo)[1];
                    if (checkdnsrr($domain, 'MX')) {
                        if (strlen($usuario) != 8 || preg_match("/[^a-zA-Z0-9]+/", $usuario)) {                     
                            echo "<script>document.getElementById('usuario').classList.add('error');</script>";  
                            echo "<div class='alert-danger'>El nombre de usuario debe tener una longitud de 8 caracteres y no debe contener caracteres especiales</div>";
                        }else{
                            $sqlusuario="INSERT INTO usuarios(nombre,correo,nombreusuario,contrasena)
                            VALUES ('$nombre','$correo','$usuario','$password_encriptada')";
                            $resultadousuario = $conexion->query($sqlusuario);

                            if($resultadousuario > 0){
                                //confirmamos el registro y se pasa a la siguiente pagina
                                echo"<script>
                                    alert('Registro Exitoso');
                                    window.location = 'home.php';
                                    </script>";
                            }else{
                                echo"<script>
                                    alert('Error al registrarse');
                                    </script>";	
                            } 
                        }
                    } else {
                        echo "<script>document.getElementById('correo').classList.add('error');</script>";
                        
                        echo "<div class='alert-danger'>El correo electrónico no existe</div>";
                    }
                } else {
                    echo "<script>document.getElementById('correo').classList.add('error');</script>";

                    echo "<div class='alert-danger'>El correo electrónico no es válido</div>";
                }
            }
        }
    }

}



?>