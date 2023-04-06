<?php

namespace App\Containers;

interface ContainerInterface {
    public static function getService(): string;
    public static function generateContainer();
}