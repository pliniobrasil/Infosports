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

<?php 
include_once('footer.php');
?>