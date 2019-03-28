<?php

$app->get('/', '\Tomodomo\Packages\Controllers\IndexController:render');

/**
 * Get a list of packages
 */
$app->get('/packages.json', '\Tomodomo\Packages\Controllers\PackagesController:renderJson');
