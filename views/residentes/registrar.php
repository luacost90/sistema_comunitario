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
    <h2>Pagina para registrar residentes</h2>
</div>
