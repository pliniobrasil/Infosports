<?php
include_once('header.php');
?>
<section>
    <div class="login">
        <form action="#" method="POST">
            <h1><b>Faça o seu login</b></h1>
            <div class="email">
                <label for="login"></label>
                <input name="login" id="itext" type="text" placeholder="Login">
            </div>
            <div class="telefone">
                <label for="senha"></label>
                <input name="senha" id="itext" type="password" placeholder="Digite sua senha">
            </div>
            <?php if($mensagemErro){
                echo "<h4>Login e/ou senha incorretos. Tente novamente ou Registre-se.</h4>";
            }
            if($mensagemAcesso){
                echo "<h4>Login efetuado com sucesso!</h4>";
            }?>
            <button type="submit" class="btnConcluir">Concluir</button>
        </form>
    </div>
</section>
<?php
include_once('footer.php');
?>