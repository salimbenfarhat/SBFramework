<?php
$variables = array(   
    'description' => 'SBFramework est un modèle de base à dupliquer pour créer des sites web'
);

switch($request) {
    case WR.'/' :
        $vars_list = array(
            'title' => 'Accueil'
        );
        render('app.page.home', 'default', compact('variables', 'vars_list'));
        break;
    default : 
    	http_response_code(404);
        $vars_list = array(
            'title' => 'Erreur 404'
        );
        render('app.page.404', 'default', compact('variables', 'vars_list'));
        break;
}