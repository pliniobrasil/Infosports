<?php
include_once('header.php');
?>
<div class="container-body">
    <div class="container">
        <div class="title">
            <h2>Contate-nos</h2>
        </div>
        <form action="">
            <form method="POST" action="#">     
                <div class="campos">
                    <div class="input-box">
                        <label for="itext"></label><br>
                        <input name="nome" id="itext" type="text" placeholder="Nome">
                    </div>
                    <div class="input-box">
                        <label for="itext"></label><br>
                        <input name="sobrenome" id="itext" type="text" placeholder="Sobrenome">
                    </div>
                    <div class="input-box">
                        <label for="itext"></label><br>
                        <input name="email" id="itext" type="text" placeholder="Email">
                    </div>
                    <div class="input-box">
                        <label for="itext"></label><br>
                        <input name="telefone" id="itext" type="text" placeholder="Telefone">
                    </div>
                    <div class="input-box">
                        <textarea name="mensagem" placeholder="Digite aqui sua mensagem"></textarea>
                    </div>
                    <br>
                </div>
                <div class="button">
                    <button type="submit" value="Enviar" class="btn-concluir" id="btnEnviar">Enviar</button>
                </div>
            </form>
        </form>
    </div>
    <section class="contacts">
        <h2>Contatos</h2>
    </section>
</div>
<?php
include_once('footer.php');
?>