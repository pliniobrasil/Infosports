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

$img = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['img'])) ? $_POST['img'] : null;

$senha = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(criptografia($_POST['senha']))) ? criptografia($_POST['senha']) : null;

$resposta = 0;

$resposta = calcularImc($peso, $altura);

$classificacao = classificarImc($resposta);

$listaNoticia = listarNoticias();

// Pegando informação da url
if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

// $arrayUrl = criarArrayUrl();

$includeUrl = FALSE;

include_once('php\header.php');

// foreach($arrayUrl as $chave => $valor){
//     if($paginaUrl === $chave){
//         echo include_once($valor);
//         $includeUrl = TRUE;
//         return $includeUrl;
//     };
// }

if($paginaUrl === "principal"){
    include_once('php\principal.php');
    cadastrar($nome,$email,$peso,$altura,$resposta,$classificacao);
}elseif($paginaUrl === "login"){
    $mensagemErro = false;
    $mensagemAcesso = false;
    $usuarioCadastrado = verificarLogin($login);
    if($usuarioCadastrado && validaSenha($senha, $usuarioCadastrado['senha'])){
        registrarAcessoValido($usuarioCadastrado);
        $mensagemAcesso = true;
    };
    if($login && !$usuarioCadastrado){
        $mensagemErro = true;
    };
    include_once('php\login.php');
}elseif($paginaUrl === "registro"){
    $mensagemErro = false;
    $permissaoRegistro = '';
    if($login){
        $permissaoRegistro = loginUnico($login);
    };
    if($permissaoRegistro === false){
        $mensagemErro = true;
    };
    protegerTela();
    include_once('php\registro.php');
    if(!empty($permissaoRegistro) && $permissaoRegistro === true){
        registro($nome,$email,$telefone,$login,$senha);
    };
}elseif($paginaUrl === "contato"){
    include_once('php\contato.php');
    cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem);
}elseif($paginaUrl === "noticia"){
    protegerTela();
    include_once('php\noticia.php');
    cadastrarNoticia($titulo, $descricao, $img);
}elseif($paginaUrl === "detalhe"){
    protegerTela();
    include_once('php\detalhe.php');    
}elseif($paginaUrl === "sair"){
    limparSessao();
}else{
    echo "404 Página não existe!";
}

include_once('php\footer.php');
?>
