<?php
$message = $_GET['result'] ?? '';

switch ($message) {
    case 1:

?>
        <div class="alert success w-100">Brincolín Creado Correctamente</div>;
    <?php
        break;
    case 2:

    ?>
        <div class="alert success w-100">Brincolín Actualizado Correctamente</div>;
    <?php
        break;
    case 3:

    ?>
        <div class="alert success w-100">Brincolín Eliminado Correctamente</div>;
<?php
        break;
    default:
        break;
}
?>