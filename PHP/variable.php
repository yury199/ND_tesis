<?php
   function updateGlobalVariable($value) {
    session_start();

    if(isset($_SESSION['global_variable'])) {
        if($value == 'increment') {
            $_SESSION['global_variable'] += 1;
        } else if($value == 'decrement') {
            $_SESSION['global_variable'] -= 1;
        } else if($value == 'reset') {
            $_SESSION['global_variable'] = 0;
        }
    }
}
?>