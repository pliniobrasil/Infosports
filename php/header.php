<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoSports</title>
        <?php if($paginaUrl === "principal"):?>
            <link rel="stylesheet" href="./css/index.css">
        <?php endif; ?>
        <?php if($paginaUrl === "login"):?>
            <link rel="stylesheet" href="./css/login.css">
        <?php endif; ?>
        <?php if($paginaUrl === "noticia"):?>
            <link rel="stylesheet" href="./css/registro.css">
        <?php endif; ?>
        <?php if($paginaUrl === "registro"):?>
            <link rel="stylesheet" href="./css/registro.css">
        <?php endif; ?>
        <?php if($paginaUrl === "contato"):?>
            <link rel="stylesheet" href="./css/contato.css">
        <?php endif; ?>
        <?php if($paginaUrl === "basquete"):?>
            <link rel="stylesheet" href="./css/paginas.css">
        <?php endif; ?>
        <?php if($paginaUrl === "boxe"):?>
            <link rel="stylesheet" href="./css/paginas.css">
        <?php endif; ?>
        <?php if($paginaUrl === "corrida"):?>
            <link rel="stylesheet" href="./css/paginas.css">
        <?php endif; ?>
        <?php if($paginaUrl === "surf"):?>
            <link rel="stylesheet" href="./css/paginas.css">
        <?php endif; ?>
        <?php if($paginaUrl === "tenis"):?>
            <link rel="stylesheet" href="./css/paginas.css">
        <?php endif; ?>
        <?php if($paginaUrl === "trilha"):?>
            <link rel="stylesheet" href="./css/paginas.css">
        <?php endif; ?>
</head>
<header>
    <a class="titulo" href="<?=constant('URL_LOCAL_PAGINA').'principal';?>">InfoSports</a>
        <nav class="mainInitial">
            <?php include_once('menuTopo.php');?>
        </nav>
</header>
<body>
