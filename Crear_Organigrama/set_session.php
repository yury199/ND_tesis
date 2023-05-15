<?php
session_start();

if (isset($_POST["nodeId"])) {
    $_SESSION["nodeId"] = $_POST["nodeId"];
    echo "Node ID stored in session: " . $_SESSION["nodeId"];
}else{
    echo "no funciona";
}
?>
