<?php

namespace Tomodomo\Packages\Controllers;

class BaseController
{
    /**
     * @return void
     */
    public function __construct( $container )
    {
        $this->container = $container;

        $this->twig = $this->container['twig'];
    }
}
