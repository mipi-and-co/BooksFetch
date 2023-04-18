<?php

namespace App\Containers;

use DI\Container;

class AppContainer {
    private Container $container;

    public function __construct() {
        $this->container = new Container();
        $this->container->set(GruzzleContainer::getService(), GruzzleContainer::generateContainer());
        $this->container->set(TwigContainer::getService(), TwigContainer::generateContainer());
    }

    public function getContainer(): Container {
        return $this->container;
    }


}