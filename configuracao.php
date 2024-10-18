<?php
session_start();
//$_SERVER["SERVER_NAME"]
switch('localhost'){
    case 'localhost':
        $enviroment['local'] = "http://localhost/";
        break;
    case 'homol':
        $enviroment['homol'] = "http:/meusite.com.br";
        break;
    case 'prod':
        $enviroment['prod'] = "";
        break;
}

/**
 * Definindo constante URL_LOCAL
 */
define("URL_LOCAL_BASE",$enviroment['local']);
define("URL_LOCAL_SITE",constant("URL_LOCAL_BASE")."Infosports/");
define("URL_LOCAL_PAGINA",constant("URL_LOCAL_SITE")."?pagina=");
define("URL_LOCAL_IMG",constant("URL_LOCAL_BASE")."./imagens/");
define("URL_LOCAL_SITE_PAGINA_LOGIN",constant("URL_LOCAL_SITE")."?pagina=login");