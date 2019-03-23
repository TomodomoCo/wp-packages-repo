<?php

$container = $app->getContainer();

$container['twig'] = function ($c) {
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');

    $twig = new Twig_Environment($loader, [
        'cache' => false,
    ]);

    return $twig;
};
