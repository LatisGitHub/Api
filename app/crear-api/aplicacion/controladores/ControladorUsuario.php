<?php

    class ControladorUsuario {

        public static function login($email, $password) {

            //0 si error no email, 1 si error password, $usuario si ok no
            $usuario = null;
            $codigo = UsuarioBD::chequearLogin($email, $password, $usuario);
            if ($codigo == 0) {
                echo "<script>window.location='enrutador.php?accion=error&codigo=0'</script>";
            } else if ($codigo == 1) {
                echo "<script>window.location='enrutador.php?accion=error&codigo=1'</script>";
            } else {
                //Usuario correcto 
                $_SESSION['usuario'] = serialize($usuario);
                echo "<script>window.location='enrutador.php?accion=inicio'</script>";

            }


        }

    }
?>