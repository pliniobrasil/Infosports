<div class="topNav">
    <br>
    <h2>BEM VINDO A INFOSPORTS!</h2>
    <br>
    <p>Aqui é onde você encontra todos os itens mais novos e modernos de seu esporte preferido.</p>
</div>
<br>

<section class="gridCard" > 
    <div class="mainContent" >
        <?php 
        $listaNoticias = listarNoticias();
        foreach($listaNoticias as $noticia):
        ?>
        <div class="categoryCard">
            <a class="pagLink" href="<?=constant('URL_LOCAL_SITE_DETALHE')?>">
                <div>
                    <img src="./imagens/<?=$noticia['img']?>" class="mainCardImg" width="320px" height="180px">
                    <br>
                    <?= $noticia["titulo"];?> <br>
                    <br>
                    <?= reduzirStr($noticia["descricao"],200);?>
                </div>
            </a>
        </div>
        <?php
        endforeach
        ?>
    </div>
            <aside class="sideIMC" >
                <div class="sideIMCContent">
                    <div class="IMC">
                        <p>INDICE DE MASSA CORPORAL (IMC)</p>
                        <div>
                            <form method="POST" action="#">
                                <label for="itext">Nome</label><br>
                                <input name="nome" id="itext" type="text" placeholder="Digite seu nome..."><br>
                                <br>
                                <label for="itext">E-mail</label><br>
                                <input name="email" id="itext" type="text" placeholder="Digite seu e-mail..."><br>
                                <br>
                                <label for="itext">Peso (KG)</label><br>
                                <input name="peso" id="itext" type="text" placeholder="Digite o peso..."><br>
                                <br>
                                <label for="itext">Altura (M)</label><br>
                                <input name="altura" id="itext" type="text" placeholder="Digite a altura..."><br>
                                <br>
                                <button type="submit" class="btnCalcular" >Calcular</button>
                            </form>
                        <br>
                        <h4>
                            Resultado: <?= $resposta;?>
                            Classificação: <?= $classificacao;?>
                        </h4>
                        </div>
                    </div>
                </div>
            </aside>
</section>  