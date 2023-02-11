<?php
    session_start();
    //session_destroy();

    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }
        
        $ruta = "./modelos/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/usuarios/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }
        $ruta = "./vistas/song/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }
    } 
    spl_autoload_register("autocarga");


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {
            //Mostrar series

            if ($_REQUEST['accion'] == "inicio") {
                ControladorLogin::mostrarFormularioLogin();
            }
    
            //Inicio - error de login
            if ($_REQUEST['accion'] == "error") {
                ControladorLogin::mostrarFormularioLoginError();
            }
            //CheckLogin
            if ($_REQUEST['accion'] == "checkLogin") {
                $email = filtrado($_REQUEST['email']);
                $password = filtrado($_REQUEST['password']);
                ControladorLogin::chequearLogin($email, $password);
            }
    
            if ($_REQUEST['accion'] == "mostrar") {
                $token = implode($_SESSION['token']);
                ControladorSong::mostrarSongs($token);
            }
            if ($_REQUEST['accion'] == "mostrarTop") {
                $token = implode($_SESSION['token']);
                ControladorSong::mostrarSongsTop($token);
            }
            //FUNCION VALORAR
            if ($_REQUEST['accion'] == "valorar") {
                $id = filtrado($_REQUEST['id']);
                $valoracion = filtrado($_REQUEST['valoracion']);
                $token = implode($_SESSION['token']);
                ControladorSong::valorar($id, $valoracion, $token);
            }
                

        }
    }





?>