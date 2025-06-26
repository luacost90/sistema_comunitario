<?php 
    session_start();

    if (!defined('ACCESS')) {
        header("Location: /sistema_comunitario/");
        exit;
    }

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['rol'])){
        header("Location: /sistema_comunitario");
        exit();
    }

    include './views/includes/sidebarMenu.php' 
?>

<div class="dashboard__container">
    <h2>Listado de residentes</h2>
    <table id="residentesTable" class="table table-striped residentes-lista__table">
        <thead class="residentes-lista__thead">
            <tr class="residentes-lista__row">
                <th class="residentes-lista__th">Cédula</th>
                <th class="residentes-lista__th">Nombre</th>
                <th class="residentes-lista__th">Apellido</th>
                <th class="residentes-lista__th">Teléfono</th>
                <th class="residentes-lista__th">Dirección</th>
                <th class="residentes-lista__th">Acciones</th>
            </tr>
        </thead>
        <tbody class="residentes-lista__tbody">
            <!-- Los datos serán insertados aquí mediante JavaScript AJAX -->
        </tbody>
    </table>
</div>
