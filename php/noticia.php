<?php
include_once('header.php');
?>
<section>
    <div class="registro">
        <form method="POST" action="#">
            <h1><b>Cadastre-se notícias!</b></h1>
            <div class="nome">
                <label for="itext"></label><br>
                <input name="titulo" id="itext" type="text" placeholder="Título">
            </div>
            <div class="email">
                <label for="itext"></label><br>
                <input name="descricao" id="itext" type="text" placeholder="Descrição">
            </div>
            <div class="nome">
                <label for="itext"></label><br>
                <input name="img" id="itext" type="text" placeholder="Imagem">
            </div>
            <button type="submit" class="btnConcluir">Concluir</button>
        </form>
    </div>
</section>
<?php
include_once('footer.php');
?>