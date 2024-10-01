<?php
include_once('header.php');
?>
<section>
    <div class="registro">
        <form method="POST" action="#">
            <h1><b>Cadastre-se para acompanhar as notícias!</b></h1>
            <div class="nome">
                <label for="itext"></label><br>
                <input name="nome" id="itext" type="text" placeholder="Nome">
            </div>
            <div class="email">
                <label for="itext"></label><br>
                <input name="email" id="itext" type="text" placeholder="Email">
            </div>
            <div class="telefone">
                <label for="itext"></label><br>
                <input name="telefone" id="itext" type="text" placeholder="Telefone">
            </div>
            <div class="nome">
                <label for="itext"></label><br>
                <input name="login" id="itext" type="text" placeholder="Insira um login válido">
            </div>
            <div class="nome">
                <label for="itext"></label><br>
                <input name="senha" id="itext" type="password" placeholder="Insira uma senha válida">
            </div>
            <button type="submit" class="btnConcluir">Concluir</button>
        </form>
    </div>
</section>
<?php
include_once('footer.php');
?>