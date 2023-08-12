<?php

if (!function_exists('_url')) {
    function _url($routeName, $parameters = []) {
        // Prepend the current locale to the parameters
        return route($routeName, array_merge([app()->getLocale()], $parameters));
    }
}

if (!function_exists('_routeHas')) {
    function _routeHas($routeName) {
        // Verifica a existência da rota com o nome fornecido
        return Route::has($routeName);
    }
}
