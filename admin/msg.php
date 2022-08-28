<?php
// foo.php
$errors = array (
    1 => "El registro se ha insertado correctamente",
    2 => "El registro se ha actualizado correctamente",
    3 => "El registro se ha eliminado correctamente",
    4 => "Error en la base de datos MySQL. Verifique su consulta",
);
$error_id = isset($_GET['msg']) ? (int)$_GET['msg'] : 0;
if ($error_id != 0 && in_array($error_id, [1,2,3,4])) {
    echo $errors[$error_id];
}else{
    echo 'MakeUp Gold';
}
?>