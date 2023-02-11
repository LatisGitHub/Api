<?php
class VistaSongTop
{
    public static function mostrarSongsTop($token)
    {
        echo '<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>APIS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
        let sonido = new Audio("img/ViolentCrimes.mp3");
        sonido.play();
        sonido.volume = 0.2;
    </script>
        </head>
    ';
        echo '<body>
    <div class="container">
        <row class="justify-content">
            <div class="container fluid col-2 md-3">
                <img src="img/disco2.gif" alt="" class="img-fluid mt-2 mb-2">
            </div>
        </row>';
        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3" style="border-radius: 5px ;">
            <div class="container-fluid">
               <a class="navbar-brand text-light" href="enrutador.php?accion=mostrar">API MUSICA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                   
                </div>
            </div>
        </nav>
        ';
       
        echo "<CENTER><h3 class='mb-4 mt-2 text-danger'> INFO </h3><CENTER>";    

       require_once('vendor/autoload.php');

       //Vendría del textarea
       //$texto = "Los coleccionistas de juegos retro";
    
       $guzzle = new GuzzleHttp\Client(['base_uri' => '3.144.143.217:3000']);
        $response = $guzzle->get('crear-api/song/top/tops', [
                'headers' => [ 'Authorization' => $token ]
        ])->getBody();

        $data = json_decode($response);
        echo '<center>
      <div class="container">
      <div class="row mt-3 align-items-center ">
          <div class="col-md-6">
          <div class="card mb-3 text-white bg-dark" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/kanye.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">ALBUMS</h5>
                <p class="card-text">2004: The College Dropout</p> 
                <p class="card-text">2005: Late Registration </p>
                 <p class="card-text">2007: Graduation</p> 
                 <p class="card-text">2008: 808s & Heartbreak</p> 
                 <p class="card-text">2010: My Beautiful Dark Twisted Fantasy</p> 
                 <p class="card-text">2016: The Life of Pablo</p>               </div>
            </div>
          </div>
        </div>
          </div>
  
            <div class="col-md-6 mb-6 text-right">';
          
           echo '<a href="enrutador.php?accion=mostrarTop" class="btn btn-dark mb-2 mt-1 pe-5 ps-5 pt-3 pb-3" style="widht:160px">TOPS</a>
            <a href="enrutador.php?accion=mostrar" class="btn btn-danger mb-2 mt-1 pe-5 ps-5 pt-3 pb-3">SONGS</a>
            </div>
        </div>
  
  
  
    </div>
    </center>
  ';
        echo "<CENTER><h3 class='mb-4 mt-2'> TOPS </h3><CENTER>";
        echo "<table class='table table-striped' style='font-size: 15px;align-items: center;' id='dataTable' width='100%' cellspacing='0'>";
        //Cabecera
        echo "<tr>";
        echo "<th>" . strtoupper("TITULO") . "</th>";
        echo "<th>" . strtoupper("GRUPO") . "</th>";
        echo "<th>" . strtoupper("DURACION") . "</th>";
        echo "<th>" . strtoupper("AÑO") . "</th>";
        echo "<th>" . strtoupper("GENERO") . "</th>";
        echo "<th>" . "PUNTUACION" . "</th>";
        echo "<th>" . "" . "</th>";
        echo "<th>" . "" . "</th>";

        echo "</tr>";
    
    
        //Contenido
        foreach ($data as $song) {
            echo '<form action="enrutador.php" method="post"> ';
            echo "<tr>";
            echo '<td>' . $song->titulo.'</td>';
            echo '<td>' . $song->grupo.'</td>';
            echo '<td>' . $song->duracion.'</td>';
            echo '<td>' . $song->anio.'</td>';
            echo '<td>' . $song->genero.'</td>';
            echo '<td>' . $song->puntuacion.'</td>';
            echo '<td>'. '<input type="range" min=1 max=5 name="valoracion">' . '</td>';
            echo "<td> <input type='hidden' name='id' value='".$song->_id."'>";
            echo " <input type='hidden' name='accion' value='valorar'>";
            echo "<button class='btn btn-dark' type='submit'>VALORAR</button></td>";
            echo "</form>";
            echo "</tr>";

        }
        echo "</table>";
  
        echo '
        <hr style="height:10px;color: black ;">';






        echo '<nav class="navbar navbar-light bg-dark text-center" style="border-radius: 5px ;">
        <div class="col-md-6">
            <h2 class="text-light ">API MUSICA</h2>
        </div>
        <div class="col-md-6 ">
            <div class="row p-2 justify-content-center">
                <div class="col-2">
                    <img src="img/twitter2.png" style="width: 70%;" class="img-fluid rounded">
                </div>
                <div class="col-2">
                    <img src="img/facebook2.png" style="width: 60%;" class="img-fluid rounded">
                </div>
                <div class="col-2">
                    <img src="img/youtube2.png" style="width: 80%;" class="img-fluid rounded">
                </div>
            </div>

        </div>
    </nav>';


        echo '</div>';

        echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <script>';
        /*  $(function() {
                //Habilita los tooltips
                $('[data-toggle="tooltip"]').tooltip({
                    container: 'body'
                });
            });*/
        echo '</script>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>';
    }
}
