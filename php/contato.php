<?php
include_once('header.php');
?>
<div class="container-body">
    <div class="container">
        <div class="title">
            <h2>Contate-nos</h2>
        </div>
        <form action="">
            
                    <div class="campos">
                        <div class="input-box">
                            <label for="itext"></label><br>
                            <input name="itext" id="itext" type="text" placeholder="Nome">
                        </div>
                        <div class="input-box">
                            <label for="itext"></label><br>
                            <input name="itext" id="itext" type="text" placeholder="Sobrenome">
                        </div>
                        <div class="input-box">
                            <label for="itext"></label><br>
                            <input name="itext" id="itext" type="text" placeholder="Email">
                        </div>
                        <div class="input-box">
                            <label for="itext"></label><br>
                            <input name="itext" id="itext" type="text" placeholder="Telefone">
                        </div>
                        <div class="input-box">
                            <textarea name="message" placeholder="Digite aqui sua mensagem"></textarea>
                        </div>
                        <br>
                    </div>
                    <div class="button">
                        <button value="Enviar" class="btn-concluir" id="btnEnviar">Enviar</button>
                    </div>
        </form>
    </div>
    <section class="contacts">
        <h2>Contatos</h2>
    </section>
</div>
<?php
include_once('footer.php');
?>