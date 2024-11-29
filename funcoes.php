<?php

function calcularImc($peso, $altura){
    $resposta = 0;
    if ($peso && $altura){
        $resposta = $peso / ($altura * $altura);
    }
    return round($resposta,2);
}

function imcBuscarPorId($id){
    $pdo = Database::conexao();
    $sql = "SELECT * FROM imc WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

function cadastrar($nome,$email,$peso,$altura,$imc,$classificacao){
    if (!$nome || !$email || !$peso || !$altura || !$imc || !$classificacao){return;}
    $sql = "INSERT INTO `imc` (`nome`,`email`,`peso`,`altura`,`imc`,`classificacao`)
    VALUES(:nome,:email,:peso,:altura,:imc,:classificacao)";
    $pdo = Database::conexao();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':imc', $imc);
    $stmt->bindParam(':classificacao', $classificacao);
    $result = $stmt->execute();
    return ($result)?true:false;
}

function classificarImc($imc){
    if($imc <= 16){
        return "Magreza grave;";
    }elseif($imc > 16 && $imc <= 17){
        return "Magreza moderada";
    }elseif($imc > 17 && $imc <= 18.5){
        return "Magreza leve";
    }elseif($imc >= 18.6 && $imc<= 24.9){
        return "Peso Ideal";
    }elseif($imc >= 25 && $imc <= 29.9 ){
        return "Sobrepeso";
    }elseif($imc >= 30 && $imc <= 34.9){
        return "Obesidade grau 1";
    }elseif($imc >= 35 && $imc <= 39.9){
        return "Obesidade grau 2 ou severa";
    }elseif($imc >= 40){
        return "Obesidade grau 3 ou morbida";
    }
}

function registro($nome,$email,$telefone,$login,$senha){
    if (!$nome || !$email || !$telefone|| !$login|| !$senha){return;}
    $sql = "INSERT INTO `registro` (`nome`,`email`,`telefone`,`login`,`senha`)
    VALUES(:nome,:email,:telefone,:login,:senha)";
    $pdo = Database::conexao();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':senha', $senha);
    $result = $stmt->execute();
    return ($result)?true:false;
}

function cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem){
    if (!$nome || !$sobrenome || !$email || !$telefone || !$mensagem){return;}
    $sql = "INSERT INTO `contato` (`nome`,`sobrenome`,`email`,`telefone`,`mensagem`)
    VALUES(:nome,:sobrenome,:email,:telefone,:mensagem)";
    $pdo = Database::conexao();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':mensagem', $mensagem);
    $result = $stmt->execute();
    return ($result)?true:false;
}

function criptografia($senha){
    if(!$senha)return false;
    return sha1($senha);
}

function verificarLogin($login){
    if(!$login){return;}
    $pdo = Database::conexao();
    $sql = "SELECT `id`, `login`, `senha` FROM registro WHERE `login` = '$login'";
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list[0];
}

function cadastrarNoticia($titulo, $descricao, $img){
    if (!$titulo || !$descricao || !$img){return;}
    $sql = "INSERT INTO `noticia` (`titulo`,`descricao`,`img`)
    VALUES(:titulo,:descricao,:img)";
    $pdo = Database::conexao();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':img', $img);
    $result = $stmt->execute();
    return ($result)?true:false;
}

function buscarNoticia($id){
    $pdo = Database::conexao();
    $sql = "SELECT * FROM noticia WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list[0];
}

function buscarNoticiaPorId($id){
     if(!$id){return;}
     $sql = "SELECT * FROM noticia WHERE `id` = :id";
     $pdo = Database::conexao();
     $stmt = $pdo->prepare($sql);
     $stmt->bindParam(':id', $id);
     $result = $stmt->execute();
     return $result[0];
}

function listarNoticias(){
    $pdo = Database::conexao();
    $sql = "SELECT * FROM noticia";
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

function buscarSugestoes($categoria,$titulo){
    $pdo = Database::conexao();
    $sql = "SELECT * FROM noticia WHERE `titulo` != '$titulo' AND categoria LIKE '$categoria'";
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

function criarArrayUrl(){
    $include = array(
        "principal" => "./php/principal.php",
        "login" => "./php/login.php",
        "registro" => "./php/registro.php",
        "contato" => "./php/contato.php",
        "basquete" => "./php/basquete.php",
        "boxe" => "./php/boxe.php",
        "corrida" => "./php/corrida.php",
        "surf" => "./php/surf.php",
        "tenis" => "./php/tenis.php",
        "trilha" => "./php/trilha.php",
    );
    return $include;
}

function listarCategorias(){
    $pdo = Database::conexao();
    $sql = "SELECT * FROM categoria";
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

function listarNoticiasPorCategoria($idCategoria){
    $pdo = Database::conexao();
    $sql = "SELECT * FROM noticia WHERE `categoriaId` = $idCategoria LIMIT 3;";
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

function cadastrarCategoria($nomeCategoria)
{
    if(!$nomeCategoria){return;}
    $sql = "INSERT INTO `categoria` (`nome`)
    VALUES(:nome)";

    $pdo = Database::conexao();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nomeCategoria);
    $result = $stmt->execute();
    return ($result)?true:false;
}

function verificarCategoriaDuplicada($termo)
{
  $pdo = Database::conexao();
  $sql = "SELECT * FROM `categoria` WHERE `nome` = '$termo'";
  $stmt = $pdo->prepare($sql);
  $list = $stmt->execute();
  $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return ($list)?true:false;
}

function gerarNumerosRandomicos(){
    return date('Y').date('m').date('d').date("h").date(':i').'-'.date('sa').rand();
  }

  function upload($imagem){
    if(!$_FILES["fileToUpload"]){return;}

    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 900000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            return $_FILES["fileToUpload"]["name"];
        } else {
            // echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
  }

function criarLista(){
    $listaCard[0] = array(
        "link" => "https://localhost/Infosports/?pagina=basquete",
        "imagem" => "imagens/basquete.png",
        "titulo" => "BASQUETE",
        "descricao" => "Drible, passe, arremesse! Junte-se ao emocionante mundo do basquete e experimente a empolgação de jogar em equipe, competir em partidas acirradas e fazer cestas incríveis."
    );

    $listaCard[1] = array(
        "link" => "https://localhost/Infosports/?pagina=boxe",
        "imagem" => "imagens/boxe.png",
        "titulo" => "BOXE",
        "descricao" => "Descubra a força interior e a técnica impecável necessária para se destacar no ringue. Desafie-se a superar seus limites  físicos e mentais enquanto aprende os segredos deste esporte de combate emocionante."
    );

    $listaCard[2] = array(
        "link" => "https://localhost/Infosports/?pagina=corrida",
        "imagem" => "imagens/corrida.png",
        "titulo" => "CORRIDA",
        "descricao" => "Calce seus tênis e sinta a energia pulsante das corridas. Desafie-se em diferentes distâncias, supere obstáculos e descubra os benefícios incríveis para a saúde e bem-estar que a corrida proporciona."
    );

    $listaCard[3] = array(
        "link" => "https://localhost/Infosports/?pagina=surf",
        "imagem" => "imagens/surf.png",
        "titulo" => "SURF",
        "descricao" => "Sinta a liberdade e a conexão com o mar enquanto desliza pelas ondas do surf. Experimente a emoção de pegar a onda perfeita, domine as técnicas e mergulhe no estilo de vida descontraído e vibrante do surf."
    );

    $listaCard[4] = array(
        "link" => "https://localhost/Infosports/?pagina=tenis",
        "imagem" => "imagens/tenis.png",
        "titulo" => "TÊNIS",
        "descricao" => "Experimente a elegância e a velocidade do tênis, um esporte que combina habilidade, estratégia e agilidade. Joque com paixão, vença com classe e desfrute da competição saudável em quadra."
    );
    
    $listaCard[5] = array(
        "link" => "https://localhost/Infosports/?pagina=trilha",
        "imagem" => "imagens/trilha.png",
        "titulo" => "TRILHA",
        "descricao" =>"Aventure-se pelos caminhos menos percorridos e descubra a beleza da natureza enquanto se desafia em trilhas emocionantes. Deixe a rotina para trás e explore novos horizontes ao ar livre."
    );

    return $listaCard;
}

criarLista();
    
/**
 * timeZone
 * Retorna o fuso horário local que definirá a hora e a data 
 */
function timeZone(){
    date_default_timezone_set("America/Recife");
}

/**
 * dataAtual
 * Retorna a data atualizada
 */
function dataAtual(){
    return date("d/m/Y");
}

/**
 * horaAtual
 * Retorna a hora atualizada
 */
function horaAtual(){
    return date("h:i:sa");
}

/**
 * reduzirStr
 * Reduzir o tamanho de um texto
 * @param $str que representa o texto a ser reduzido
 * @param $quantidade que representa quantos caracteres vão ser exibidos
 */
function reduzirStr($str,$quantidade){
    $tamanho = strlen($str);
    if($str && $tamanho >= $quantidade){
      return substr($str,0,$quantidade)." [...]";
    }else{
        return $str;
    }
}

/**
 * @param $texto
 * É o texto que será manupulado
 * Retorna Texto maiúsculo
 */
function textoMaiusculo($texto){
    if($texto){
        return strtoupper($texto);
    }
}

/**
 * @param $texto
 * É o texto que será manupulado
 * @param  $tipo
 * É o Número que indica o tipo de 
 * manipulação da string
 * Tipos:
 * 1 - Quantidade de caracters de um texto
 * 2 - Quantidade de palavras de um texto
 * 3 - Busca Posição da palavra na string
 */
function contar($texto, $tipo){
    if($texto && $tipo === 1){
        return strlen($texto);
    }
    if($texto && $tipo === 2){
        return str_word_count($texto);
    }
    if($texto && $tipo === 3){
        return strpos($texto, "Diogo");
    }
    return false;
}

?>