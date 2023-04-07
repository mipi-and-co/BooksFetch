<?php

namespace App\Data\BookData;

use DateTime;
use http\Exception\InvalidArgumentException;

class BookFactory {
    private string $title;
    private string $subtitle;
    private array $tabAuthors;
    private string $language;
    private string $type;
    private array $thematic;
    private DateTime $publicationDate;
    private string $urlThumbnail;
    private string $ISBM;
    private int $pagesCount;
    public const DATE_FORMAT_RECEIVED = "2000-01-01";

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function setSubtitle(string $subtitle): void {
        $this->subtitle = $subtitle;
    }

    public function setTabAuthor(array $tabAuthors): void {
        $this->tabAuthors = $tabAuthors;
    }

    public function setLanguage(string $language): void {
        $this->language = $language;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function setThematic(array $thematic): void {
        $this->thematic = $thematic;
    }

    public function setPublicationDate(DateTime $publicationDate): void {
        $this->publicationDate = $publicationDate;
    }

    public function setUrlThumbnail(string $urlThumbnail): void {
        $this->urlThumbnail = $urlThumbnail;
    }

    public function setISBM13(string $ISBM): void {
        $this->ISBM = $ISBM;
    }

    public function setPagesCount(int $pagesCount): void {
        $this->pagesCount = $pagesCount;
    }

    public function create(): Book {
        if (!$this->allValueHasBeenCompleted())
            throw new InvalidArgumentException("Vous n'avez pas initialisé tous les champs du Factory");

        $book = new Book($this->title, $this->subtitle, $this->tabAuthors, $this->language, $this->type, $this->thematic, $this->publicationDate, $this->urlThumbnail, $this->ISBM, $this->pagesCount);
        $this->reset();
        return $book;
    }

    private function reset(): void {
        $this->title = $this->subtitle = $this->language = $this->ISBM = $this->type = $this->urlThumbnail = NULL;
        $this->tabAuthors = $this->thematic = NULL;
        $this->publicationDate = null;
        $this->pagesCount = null;
    }

    private function allValueHasBeenCompleted(): bool {
        return $this->title != null && $this->subtitle != null && $this->tabAuthors != null && $this->language != null && $this->type != null && $this->thematic != null && $this->publicationDate != null && $this->urlThumbnail != null && $this->ISBM != null && $this->pagesCount != null;
    }


}