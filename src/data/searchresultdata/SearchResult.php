<?php

namespace App\Data\SearchResultData;

class SearchResult {
    private array $booksTab;
    private int $nbElemResult;

    public function __construct(array $booksTab, int $nbElemResult) {
        $this->booksTab = $booksTab;
        $this->nbElemResult = $nbElemResult;
    }

    public function getBooksTab(): array {
        return $this->booksTab;
    }

    public function getNbElemResult(): int {
        return $this->nbElemResult;
    }

}