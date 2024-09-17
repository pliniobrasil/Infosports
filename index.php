<?php
    include_once('php\funcoes.php');
    include_once('configuracao.php');

// Pegando informação da url
if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

include_once('php\header.php');
if($paginaUrl == "principal"){
    include_once('php\principal.php');
}elseif($paginaUrl == "login"){
    include_once('php\login.php');
}elseif($paginaUrl == "registro"){
    include_once('php\registro.php');
}elseif($paginaUrl == "contato"){
    include_once('php\contato.php');
}elseif($paginaUrl == "basquete"){
    include_once('php\basquete.php');
}elseif($paginaUrl == "boxe"){
    include_once('php\boxe.php');
}elseif($paginaUrl == "corrida"){
    include_once('php\corrida.php');
}elseif($paginaUrl == "surf"){
    include_once('php\surf.php');
}elseif($paginaUrl == "tenis"){
    include_once('php\tenis.php');
}elseif($paginaUrl == "trilha"){
    include_once('php\trilha.php');
}else{
    echo "404 Página não existe!";
}
include_once('php\footer.php');
?>
