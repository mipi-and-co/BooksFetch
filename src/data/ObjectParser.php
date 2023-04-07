<?php

namespace App\Data;

interface ObjectParser {
    public static function parseObject(mixed $jsonObject): object;
}