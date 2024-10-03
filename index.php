<?php

include_once('php\funcoes.php');
include_once('configuracao.php');
include_once("configuracao/conexao.php");

$nome = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome'])) ? $_POST['nome'] : null;

$sobrenome = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['sobrenome'])) ? $_POST['sobrenome'] : null;

$email = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) ? $_POST['email'] : null;

$peso = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['peso'])) ? $_POST['peso'] : null;

$altura = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['altura'])) ? $_POST['altura'] : null;

$telefone = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['telefone'])) ? $_POST['telefone'] : null;

$mensagem = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['mensagem'])) ? $_POST['mensagem'] : null;

$login = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['login'])) ? $_POST['login'] : null;

$senha = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['senha'])) ? $_POST['senha'] : null;

$titulo = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['titulo'])) ? $_POST['titulo'] : null;

$descricao = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['descricao'])) ? $_POST['descricao'] : null;

$descricaoCurta = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['descricaoCurta'])) ? $_POST['descricaoCurta'] : null;

$img = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['img'])) ? $_POST['img'] : null;

$href = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['href'])) ? $_POST['href'] : null;

$resposta = 0;

$resposta = calcularImc($peso, $altura);

$classificacao = classificarImc($resposta);

// Pegando informação da url
if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

$arrayUrl = criarArrayUrl();
$includeUrl = FALSE;

if($paginaUrl === "principal"){
    cadastrar($nome,$email,$peso,$altura,$resposta,$classificacao);    
}elseif($paginaUrl === "noticia"){
    cadastrarNoticia($titulo, $descricao, $descricaoCurta, $img, $href);
}elseif($paginaUrl === "registro"){
    registro($nome,$email,$telefone,$login,$senha);  
}elseif($paginaUrl === "contato"){
    cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem);
}

include_once('php\header.php');

foreach($arrayUrl as $chave => $valor){
    if($paginaUrl === $chave){
        echo include_once($valor);
        $includeUrl = TRUE;
        return $includeUrl;
    };
}

// if($paginaUrl == "principal"){
//     include_once('php\principal.php');
// }elseif($paginaUrl == "noticia"){
//     include_once('php\noticia.php');
// }elseif($paginaUrl == "login"){
//     include_once('php\login.php');
// }elseif($paginaUrl == "registro"){
//     include_once('php\registro.php');
// }elseif($paginaUrl == "contato"){
//     include_once('php\contato.php');
// }elseif($paginaUrl == "basquete"){
//     include_once('php\basquete.php');
// }elseif($paginaUrl == "boxe"){
//     include_once('php\boxe.php');
// }elseif($paginaUrl == "corrida"){
//     include_once('php\corrida.php');
// }elseif($paginaUrl == "surf"){
//     include_once('php\surf.php');
// }elseif($paginaUrl == "tenis"){
//     include_once('php\tenis.php');
// }elseif($paginaUrl == "trilha"){
//     include_once('php\trilha.php');
// }else{
//     echo "404 Página não existe!";
// }
include_once('php\footer.php');
?>
