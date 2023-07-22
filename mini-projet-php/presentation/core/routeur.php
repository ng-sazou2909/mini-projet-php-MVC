<?php
    class Routeur {
       static function parse($url, $request){
        $url = trim($url, '/');
        $params = explode('/', $url);
        $request->controller = $params[0];
        $request->action = isset($params[1])?$params[1]:'';
        $request->params = array_slice($params, 2);
        return true;
       }
       public static function route($request) {
        $routes = array(
            'articles' => array(
                'category' => 'showCategory',
                // Autres actions liées aux articles
            ),
            // Autres contrôleurs
        );

        $controller = $request->controller;
        $action = $request->action;

        if (isset($routes[$controller][$action])) {
            $method = $routes[$controller][$action];
            if (method_exists('ControleurPrincipal', $method)) {
                ControleurPrincipal::$method($request);
            } else {
                ControleurPrincipal::error();
            }
        } else {
            ControleurPrincipal::error();
        }
    }
    }
?>