<?php
    return [
        '/' => ['controller' => 'AuthController', 'module' => 'authentication/', 'method' => 'viewLogin'],
        
        '/dashboard'=>['controller' => 'AuthController', 'module' => 'authentication/', 'method' => 'viewDashboard'],

        '/residentes' => ['controller' => 'ResidenteController', 'module' => 'residentes/', 'method' => 'viewListar'],
        
        '/registrar' => ['controller' => 'ResidenteController', 'module' => 'residentes/','method' => 'viewRegistrar'],
        
        'residentes/edit' => ['controller' => 'StudentController', 'method' => 'edit']
    ];
?>