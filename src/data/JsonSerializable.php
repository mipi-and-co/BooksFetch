<?php

namespace App\Data;

Interface JsonSerializable {
    public function toJson(): string;
}