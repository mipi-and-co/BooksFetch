<?php

namespace App\Containers;

use DI\Container;

class AppContainer {
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
        $this->container->set('Gruzzle', GruzzleContainer::generateContainer());
    }

    public function getContainer(): Container {
        return $this->container;
    }


}