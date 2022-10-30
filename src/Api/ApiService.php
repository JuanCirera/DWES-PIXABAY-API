<?php

namespace App\Api;

use App\Modelos\Imagen;
use \Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__."/../../");
$dotenv->load();

//Constantes del .env
define("URL","{$_ENV['URL_BASE']}{$_ENV['API_KEY']}{$_ENV['FILTRO_BUSQUEDA']}");
//En este caso todo se puede concatenar solo en la url,
//no es necesaria ninguna constante imagen porque el json ya trae la url completa.


class ApiService{
   
    public function getImagenes():array{
        $imagenes=[];
        $datos=file_get_contents(URL);
        $datosJson=json_decode($datos);
        //Aqui hay que tener cuidado con el nombre del array del json, que no se llaman todos igual
        $datosImagenes=$datosJson->hits;

        foreach($datosImagenes as $imagen){
            $imagenes[]=(new Imagen)->
            setImagen($imagen->webformatURL)->
            setAutor($imagen->user)->
            setLikes($imagen->likes);
        }
        return $imagenes;
    }
}
