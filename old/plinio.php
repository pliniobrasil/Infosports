<?php

$meuTexto = "Plinio";
$numero = 199;
$decimal = 9.9;
$logico = false;
$Array = null;
$Object = null;
$vazio = null;

//Array ou lista
$listaCarros = array("Volvo", "BMW", "Toyota");
$listaCarros = array("Volvo", array("318", "mini", "320"), "Toyota");

function letraMaiuscula($teste){
    echo strtoupper ("$teste");
}

letraMaiuscula("teste"); echo "<br>";
letraMaiuscula("plinio"); echo "<br>";
letraMaiuscula("titulo"); echo "<br>";

$listaNoticias[0] = array(
    "titulo" => "Titulo",
    "descricao" => "Texto",
    "imagem" => "imagem.jpg"
);

$listaNoticias[1] = array(
    "titulo" => "Titulo 2",
    "descricao" => "Texto 2",
    "imagem" => "imagem2.jpg"
);

// var_dump($meuTexto); echo "<br>";
// var_dump($numero); echo "<br>";
// var_dump($decimal); echo "<br>";
// var_dump($logico); echo "<br>";
// var_dump($Array); echo "<br>";
// var_dump($Object); echo "<br>";
// var_dump($vazio); echo "<br>";
// var_dump($listaCarros); echo "<br>";
// var_dump($listaCarros[2]); echo "<br>";
// var_dump($listaNoticias); echo "<br>";

foreach($listaNoticias as $noticia){
    var_dump($noticia['titulo']);
    echo "<br>";
}
?>