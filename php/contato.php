<?php
include_once('header.php');
?>
<div class="container-body">
    <div class="container">
        <div class="title">
            <h2>Contate-nos</h2>
        </div>       
        <form method="POST" action="#">     
            <div class="campos">
                <div class="input-box">
                    <label for="itext"></label><br>
                    <input name="nome"  type="text" placeholder="Nome">
                </div>
                <div class="input-box">
                    <label for="itext"></label><br>
                    <input name="sobrenome"  type="text" placeholder="Sobrenome">
                </div>
                <div class="input-box">
                    <label for="itext"></label><br>
                    <input name="email"  type="text" placeholder="Email">
                </div>
                <div class="input-box">
                    <label for="itext"></label><br>
                    <input name="telefone"  type="text" placeholder="Telefone">
                </div>
                <div class="input-box">
                    <textarea name="mensagem" placeholder="Digite aqui sua mensagem"></textarea>
                </div>
                <br>
            </div>
            <div class="button">
                <button type="submit" value="Enviar" class="btn-concluir" >Enviar</button>
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