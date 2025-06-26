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
    <form class="registrar__form" id="registrar__form">
        <div class="registrar__form-group">
            <label class="registrar__label" for="cedula_residente">Cédula</label>
            <input class="registrar__input" type="text" id="cedula_residente" name="cedula_residente" placeholder="Ejemplo: V-12345678 o E-12345678">
        </div>
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
            <input class="registrar__input" type="tel" id="telefono" placeholder="Ejemplo: 0412-1234567 o 0212-1234567" name="telefono" required>
        </div>
        <div class="registrar__form-group">
            <label class="registrar__label" for="embarazo">¿Embarazo?</label>
            <input class="registrar__checkbox" type="checkbox" id="embarazo" name="embarazo" value="1">
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
            <button class="registrar__button" type="submit">Registrar</button>
        </div>
    </form>
</div>
