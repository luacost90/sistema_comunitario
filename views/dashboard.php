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

 
    include 'includes/sidebarMenu.php';      
?>

<div class="dashboard__container">
    <div class="dashboard-cards">
       
    </div>
</div>


