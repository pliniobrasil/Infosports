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
            foreach (criarLista() as $item){
        ?>
            <div class="categoryCard">
                <a class="pagLink" href=<?= $item["link"];?>>
                    <div>
                        <!-- <img src= <?php echo $imagem1;?> class="mainCardImg" width="320px" height="180px">
                        <p class="mainCategoryCardTitle">BASQUETE</p>
                        <p class="mainCategoryCardDescripion">Drible, passe, arremesse! Junte-se ao emocionante mundo do basquete e experimente a empolgação de jogar em equipe, competir em partidas acirradas e fazer cestas incríveis.</p> -->

                        <img src= <?php echo $item["imagem"];?> class="mainCardImg" width="320px" height="180px">
                        <br>
                        <?php echo $item["titulo"];?> <br>
                        <br>
                        <?php echo $item["descricao"];?>
                    </div>
                </a>
            </div>
            <br>
            <!-- <div class="categoryCard">
                <a class="pagLink" href="./html/trilha.html">
                    <div>
                        <img src= <?php echo $listaCard[5]["imagem"];?> class="mainCardImg" width="320px" height="180px">
                        <br>
                        <?php echo $listaCard[5]["titulo"]?> <br>
                        <br>
                        <?php echo $listaCard[5]["descricao"]?>
                    </div>
                </a>
            </div>
            <br> -->
        <?php
            }
        ?>
    </div>
            <aside class="sideIMC" >
                <div class="sideIMCContent">
                    <div class="IMC">
                        <p>INDICE DE MASSA CORPORAL (IMC)</p>
                        <div>
                            <form method="POST" action="#">
                                <label for="itext">Peso (KG)</label><br>
                                <input name="peso" id="itext" type="text" placeholder="Digite o peso..."><br>
                                <br>
                                <label for="itext">Altura (M)</label><br>
                                <input name="altura" id="itext" type="text" placeholder="Digite a altura..."><br>
                                <br>
                                <button type="submit" class="btnCalcular" >Calcular</button>
                            </form>
                        <br>
                        Resultado : <?= $resposta;?>
                        </div>
                    </div>
                </div>
            </aside>
</section>  