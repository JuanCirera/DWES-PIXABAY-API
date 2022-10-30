<?php

use App\Api\ApiService;

require __DIR__ . "/../vendor/autoload.php";

$imagenes = (new ApiService)->getImagenes();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Practica Pixabay Api</title>
</head>

<body class="bg-dark" style="min-height: 100vh; display:flex; flex-direction:column;">
    <div id="carouselExampleControls" class="container carousel slide" data-bs-ride="carousel" style="flex: 1;">
        <div class="carousel-inner">
            <?php
            $cont = 0;
            foreach ($imagenes as $imagen) {
                $cont++;
                //Para evitar que todos los elementos sean active se usa un contador
                if ($cont == 1) {
                    echo "<div class='carousel-item active'>
                        <div class='card bg-dark text-white border-1 mt-5 mb-5' style='border-color:#2D3237'>
                            <img src='{$imagen->getImagen()}' class='d-block w-100' alt='...'>
                            <div class='card-body'>
                                <p class='card-text'><b>Autor: </b>{$imagen->getAutor()}</p>
                                <p class='card-text'>{$imagen->getLikes()}<b> likes</b></p>
                            </div>
                        </div>
                    </div>";
                } else {
                    echo "<div class='carousel-item'>
                        <div class='card bg-dark text-white border-1 mt-5 mb-5' style='border-color:#2D3237'>
                            <img src='{$imagen->getImagen()}' class='d-block w-100' alt='...'>
                            <div class='card-body'>
                                <p class='card-text'><b>Autor: </b> {$imagen->getAutor()}</p>
                                <p class='card-text'>{$imagen->getLikes()}<b> likes</b></p>
                            </div>
                        </div>
                    </div>";
                }
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <footer class="text-center text-white" style="background-color:#24282C;">
        <div class="container p-4 pb-0">
            <p>
                Juan Fco Cirera Rosa 2ºDAW-DWES
            </p>
            <br>
            <section class="mb-4">
                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/juan-francisco-cirera-rosa-98a6b5176/" target="_blank" role="button"><i class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/JuanCirera" target="_blank" role="button"><i class="fab fa-github"></i></a>
            </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright
        </div>

    </footer>
</body>

</html>