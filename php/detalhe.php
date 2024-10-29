<?php 
include_once('header.php');
?>

<p class="sectionTitle" id="backToTop">BEM VINDO A INFOSPORTS!</p>
<p class="sectionDescription">Aqui é onde você encontra todos os itens mais novos e modernos do seu esporte preferido.</p>

<section class="gridContainer">
    <div class="mainContent">
        <div class="categoryCard">
            <img src="./imagens/<?=$noticia['img']?>" class="mainCardImg" width="320px" height="180px">
            <br>
            <?= $noticia["titulo"];?> <br>
            <br>
            <?= $noticia["descricao"];?>
        </div>
    </div>
</section>

<h4>Notícias relacionadas: </h4>

<?php
$buscarSugestao = buscarSugestoes($noticia["categoria"],$noticia["titulo"]);
?>

<section class="gridCard" > 
    <div class="mainContent" >
        <?php 
        $buscarSugestao = buscarSugestoes($noticia["categoria"],$noticia["titulo"]);
        foreach($buscarSugestao as $noticia):
        ?>
        <div class="categoryCard">
            <a class="pagLink" href="<?=constant('URL_LOCAL_SITE').$noticia["id"]; ?>">
                <div>
                    <img src="./imagens/<?=$noticia['img']?>" class="mainCardImg" width="320px" height="180px">
                    <br>
                    <?= $noticia["titulo"];?> <br>
                    <br>
                    <?= reduzirStr($noticia["descricao"],200);?>
                </div>
            </a>
        </div>
</section>

<?php
endforeach
?>

<?php 
include_once('footer.php');
?>