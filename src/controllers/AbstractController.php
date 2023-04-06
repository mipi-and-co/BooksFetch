<?php

namespace App\Controllers;
use Psr\Container\ContainerInterface as ContainerInterfacePsr7;

abstract class AbstractController {
    private ContainerInterfacePsr7 $container;

    public function __construct(ContainerInterfacePsr7 $container) {
        $this->container = $container;
    }

    public function getContainer(): ContainerInterfacePsr7 {
        return $this->container;
    }

}
