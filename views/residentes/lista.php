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
    <div class="residentes-lista__filters">
        <form id="filtroResidentesForm" class="form-inline mb-3">
            <div class="form-group mr-3">
            <label for="buscarCedula" class="mr-2">Buscar por Cédula:</label>
            <input type="text" id="buscarCedula" name="cedula" class="form-control" placeholder="Ingrese cédula">
            </div>
            <div class="form-group mr-3">
            <label for="categoriaEdad" class="mr-2">Categoría de Edad:</label>
            <select id="categoriaEdad" name="categoria_edad" class="form-control">
                <option value="">Todas</option>
                <option value="Infante">Infante (0-3)</option>
                <option value="Niño/a">Niño/a (3-12)</option>
                <option value="Adolescente">Adolescente (13-17)</option>
                <option value="Adulto/a">Adulto/a (18-64)</option>
                <option value="Adulto/a mayor">Adulto/a Mayor (65+)</option>
            </select>
            </div>
            <div class="form-group mr-3">
            <label for="sexo" class="mr-2">Sexo/Género:</label>
            <select id="sexo" name="sexo" class="form-control">
                <option value="">Todos</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
            </div>
            <div class="form-group mr-3">
            <label for="embarazada" class="mr-2">¿Embarazada?</label>
            <select id="embarazada" name="embarazada" class="form-control">
                <option value="">Todas</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
    </div>
    <!-- Modal Estructura HTML -->
    <div id="residenteModal" class="modal" style="">
        <div class="modal-content">
            <span class="close-modal" id="closeResidenteModal">&times;</span>
            <h3 id="modalTitle">Detalles del Residente</h3>
            <div id="modalBody">
                <!-- Aquí se mostrará la información del residente -->
                <p><strong>Cédula:</strong> <span id="modalCedula"></span></p>
                <p><strong>Nombre:</strong> <span id="modalNombre"></span></p>
                <p><strong>Apellido:</strong> <span id="modalApellido"></span></p>
                <p><strong>Edad:</strong> <span id="modalEdad"></span></p>
                <p><strong>Sexo:</strong> <span id="modalSexo"></span></p>
                <p><strong>Embarazo:</strong> <span id="modalEmbarazo"></span></p>
                <p><strong>Teléfono:</strong> <span id="modalTelefono"></span></p>
                <p><strong>Dirección:</strong> <span id="modalDireccion"></span></p>
                <!-- Puedes agregar más campos según sea necesario -->
            </div>
            <div class="modal-footer">
                <button type="button" id="modalCloseBtn" class="btn btn-secondary">Cerrar</button>
            </div>
        </div>
    </div>
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
