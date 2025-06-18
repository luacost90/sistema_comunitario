<?php
   session_start();
   
   if(isset($_SESSION['user_id']) || isset($_SESSION['username']) || isset($_SESSION['rol'])){
        header("Location: /sistema_comunitario/residentes");
        exit();
    }

    if (!defined('ACCESS')) {
        header("Location: /sistema_comunitario/");
        exit;
    }
?>
<div class="containerForm">
    <form id="loginForm" class="card__form">
        <h2 class="card__form-title">Login</h2>
        <input type="text" class="card__form-input" placeholder="Username" name="username" id="username">
        <input type="password" class="card__form-input"  placeholder="Contraseña" name="password" id="password" autocomplete>
        <button class="card__form-button"  type="submit">Iniciar Sesión</button>
    </form>
</div>
