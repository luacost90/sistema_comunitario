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
    <h2 class="registrar__title">Registrar Residente</h2>
    <form class="registrar__form" action="" method="post">
        <div class="registrar__form-group">
            <label class="registrar__label" for="nombre_residente">Nombre</label>
            <input class="registrar__input" type="text" id="nombre_residente" name="nombre_residente" required>
        </div>
        <div class="registrar__form-group">
            <label class="registrar__label" for="apellido_residente">Apellido</label>
            <input class="registrar__input" type="text" id="apellido_residente" name="apellido_residente" required>
        </div>
        <div class="registrar__form-group">
            <label class="registrar__label" for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input class="registrar__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>
        <div class="registrar__form-group">
            <label class="registrar__label" for="direccion">Dirección</label>
            <input class="registrar__input" type="text" id="direccion" name="direccion" required>
        </div>
        <div class="registrar__form-group">
            <label class="registrar__label" for="telefono">Teléfono</label>
            <input class="registrar__input" type="tel" id="telefono" name="telefono" required>
        </div>
        <div class="registrar__form-group">
            <label class="registrar__label" for="embarazo">¿Embarazo?</label>
            <input class="registrar__checkbox" type="checkbox" id="embarazo" name="embarazo" value="1">
        </div>
        <div class="registrar__form-group">
            <label class="registrar__label" for="fk_grupo_familiar">Grupo Familiar</label>
            <button type="button" class="registrar__button" onclick="document.getElementById('grupoFamiliarModal').style.display='block'">
            Seleccionar o Agregar Grupo Familiar
            </button>
            <input type="hidden" id="fk_grupo_familiar" name="fk_grupo_familiar" required>
            <div id="grupoFamiliarSeleccionado" style="margin-top: 10px; color: #333;"></div>
        </div>

        <!-- Modal Grupo Familiar -->
        <div id="grupoFamiliarModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4);">
            <div style="background:#fff; margin:5% auto; padding:20px; border-radius:8px; width:90%; max-width:400px; position:relative;">
            <span style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:20px;" onclick="document.getElementById('grupoFamiliarModal').style.display='none'">&times;</span>
            <h3>Seleccionar Grupo Familiar</h3>
            <!-- Campo de búsqueda -->
            <input type="text" id="buscarGrupoFamiliar" placeholder="Buscar grupo familiar..." style="width:100%; margin-bottom:10px;" onkeyup="filtrarGruposFamiliares()">
            <select id="modalGrupoFamiliarSelect" style="width:100%; margin-bottom:10px;">
                <option value="">Seleccione</option>
                <!-- Aquí puedes cargar dinámicamente los grupos familiares existentes con PHP si lo deseas -->
            </select>
            <button type="button" onclick="seleccionarGrupoFamiliar()" style="margin-bottom:10px;">Seleccionar</button>
            <hr>
            <h4>Agregar Nuevo Grupo Familiar</h4>
            <input type="text" id="nuevoGrupoFamiliar" placeholder="Nombre del grupo" style="width:100%; margin-bottom:10px;">
            <button type="button" onclick="agregarNuevoGrupoFamiliar()">Agregar</button>
            </div>
        </div>
        
        
        <div class="registrar__form-group">
            <label class="registrar__label" for="fk_genero">Género</label>
            <select class="registrar__select" id="fk_genero" name="fk_genero" required>
                <option value="">Seleccione</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Otro</option>
            </select>
        </div>
        <div class="registrar__form-group">
            <label class="registrar__label" for="fk_edad_categoria">Categoría de Edad</label>
            <select class="registrar__select" id="fk_edad_categoria" name="fk_edad_categoria" required>
            <option value="">Seleccione</option>
            <option value="1">Niño/a</option>
            <option value="2">Adolescente</option>
            <option value="3">Adulto/a</option>
            <option value="4">Adulto/a mayor</option>
            </select>
        </div>
        <div class="registrar__form-group">
            <button class="registrar__button" type="submit">Registrar</button>
        </div>
    </form>
</div>
