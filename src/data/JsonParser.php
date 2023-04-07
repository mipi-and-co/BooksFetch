<?php

namespace App\Data;

interface JsonParser {
    public static function parseJson(string $jsonString): object;
}