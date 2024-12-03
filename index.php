<?php

include_once('funcoes.php');
include_once('configuracao.php');
include_once("configuracao/conexao.php");
include_once("model/acesso_model.php");

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

$img = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['fileToUpload'])) ? $_POST['fileToUpload'] : null;

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

    $usuarioCadastrado = acesso::verificarLogin($login);
    
    if($usuarioCadastrado && acesso::validaSenha($senha, $usuarioCadastrado['senha'])){
        
        acesso::registrarAcessoValido($usuarioCadastrado);
    }

    include_once('view\login-view');
}elseif($paginaUrl === "registro"){

    acesso::protegerTela();

    include_once('controller/registro_controller.php');

}elseif($paginaUrl === "contato"){

    include_once('view\contato-view');

    cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem);

}elseif($paginaUrl === "noticia"){

    acesso::protegerTela();

    include_once('view\noticia-view');

    $nomedaImagem = upload($imagem);

    cadastrarNoticia($titulo, $descricao, $nomedaImagem);

    $categorias = listarCategorias();

}elseif($paginaUrl === "cadastrar-categoria"){

    if(!verificarCategoriaDuplicada($nomeCategoria)){

    cadastrarCategoria($nomeCategoria);
    }

    acesso::protegerTela();

    include_once("view\categoria-view");

}elseif($paginaUrl === "detalhe"){

    if($_GET && isset($_GET['id'])){

        $idNoticia = $_GET['id'];

    }else{

    $idNoticia = 0;
    }

    $noticia = buscarNoticia($idNoticia);

    $noticiasPorCategoria = listarNoticiasPorCategoria($noticia['categoriaId']);

    $categorias = listarCategorias();

    include_once('view\detalhe-view'); 

}elseif($paginaUrl === "sair"){

    acesso::limparSessao();

}else{
    echo "404 Página não existe!";
}

include_once('view\footer-view');
?>