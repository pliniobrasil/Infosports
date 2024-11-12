<?php

include_once('funcoes.php');
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

$titulo = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['titulo'])) ? $_POST['titulo'] : null;

$descricao = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['descricao'])) ? $_POST['descricao'] : null;

$img = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['img'])) ? $_POST['img'] : null;

$nomeCategoria = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nomeCategoria'])) ? $_POST['nomeCategoria'] : null;

@$senha = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(criptografia($_POST['senha']))) ? criptografia($_POST['senha']) : null;

$resposta = 0;

$resposta = calcularImc($peso, $altura);

$classificacao = classificarImc($resposta);

$listaNoticia = listarNoticias();

$noticia = null;

$categoria = [];

$noticiaPorCategoria = [];

// Pegando informação da url
if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

include_once('view\header-view');

if($paginaUrl === "principal"){

    include_once('view\principal-view');
    cadastrar($nome,$email,$peso,$altura,$resposta,$classificacao);

}elseif($paginaUrl === "login"){

    $usuarioCadastrado = verificarLogin($login);
    
    if($usuarioCadastrado && validaSenha($senha, $usuarioCadastrado['senha'])){
        
        registrarAcessoValido($usuarioCadastrado);
    }

    include_once('view\login-view');
}elseif($paginaUrl === "registro"){

    include_once('view\registro-view');

    registro($nome,$email,$telefone,$login,$senha);

}elseif($paginaUrl === "contato"){

    include_once('view\contato-view');

    cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem);

}elseif($paginaUrl === "noticia"){

    protegerTela();

    include_once('view\noticia-view');

    cadastrarNoticia($titulo, $descricao, $img);

    $categorias = listarCategorias();

}elseif($paginaUrl === "cadastrar-categoria"){

    if(!verificarCategoriaDuplicada($nomeCategoria)){

    cadastrarCategoria($nomeCategoria);
    }

    protegerTela();

    include_once("view\categoria-view");

}elseif($paginaUrl === "detalhe"){

    if($_GET && isset($_GET['id'])){

        $idNoticia = $_GET['id'];

    }else{

    $idNoticia = 0;
    }

    $noticia = buscarNoticia($idNoticia);

    $categorias = listarCategorias();

    include_once('view\detalhe-view'); 

}elseif($paginaUrl === "sair"){

    limparSessao();

}else{
    echo "404 Página não existe!";
}

include_once('view\footer-view');
?>