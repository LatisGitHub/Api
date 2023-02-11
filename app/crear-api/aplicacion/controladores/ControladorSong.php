<?php  

class ControladorSong {
   
    public static function mostrarSongs($token) {
        VistaSong::mostrarSongs($token);

    }

    public static function mostrarSongsTop($token) {
        VistaSongTop::mostrarSongsTop($token);

    }
    public static function valorar($id, $valoracion, $token) {
        require_once('vendor/autoload.php');

       $client = new \GuzzleHttp\Client();
       $response = $client->request('PUT', 'http://3.144.143.217:3000/crear-api/song/'.$id, [
        'body' => '{"puntuacion":"'.$valoracion.'"}',
           'headers' => [
               'accept' => 'application/json',
               'content-type' => 'application/json',
               'authorization' => $token
           ],
       ]);

       $respuesta = $response->getBody();
       $var = json_decode($respuesta, true);
       echo "<script>window.location='enrutador.php?accion=mostrar';</script>";

    

    }
}
