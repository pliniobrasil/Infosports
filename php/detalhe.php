<?php include_once('header.php');

if($_GET && isset($_GET['noticia'])){
    $noticiaId = $_GET['noticia'];
}else{
    $noticiaId = null;
}var_dump($noticiaId); ?>,

<div class="divInterna">
    <img class="imgAtleta" src="<?= $listaNoticia[$noticiaId]['img'];?>">
    <h1 class="title"><?= $listaNoticia[$noticiaId]['titulo'];?></h1>
    <br>
    <p class="info"><?= $listaNoticia[$noticiaId]['descricao'];?></p>
</div>
