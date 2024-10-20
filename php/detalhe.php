<?php include_once('header.php');

if($_GET && isset($_GET['noticia'])){
    $noticiaId = $_GET['noticia'];
}else{
    $noticiaId = null;
}
$noticia = buscarNoticia($noticiaId);
?>

<div class="divInterna">
    <img class="imgAtleta" src="<?= constant("URL_LOCAL_BASE").'imagens/'.$noticia["img"];?>">
    <h1 class="title"><?= $noticia['titulo'];?></h1>
    <br>
    <p class="info"><?= $noticia['descricao'];?></p>
</div>
