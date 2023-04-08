<?php

namespace App\Data\BookData;

use DateTime;

class BookFactory {
    private string $title;
    private string $subtitle;
    private array $tabAuthors;
    private string $language;
    private string $type;
    private array $thematic;
    private DateTime $publicationDate;
    private string $urlThumbnail;
    private string $ISBM10;
    private string $ISBM13;
    private string $pagesCount;
    public const DATE_FORMAT_COMPLETE = "Y-m-d";
    public const DATE_FORMAT_INCOMPLETE = "Y";

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

    public function setISBM13(string $ISBM13): void {
        $this->ISBM13 = $ISBM13;
    }
    public function setISBM10(string $ISBM10): void {
        $this->ISBM10 = $ISBM10;
    }

    public function setPagesCount(string $pagesCount): void {
        $this->pagesCount = $pagesCount;
    }

    public function create(): Book {
        return new Book($this->title, $this->subtitle, $this->tabAuthors, $this->language, $this->type, $this->thematic, $this->publicationDate, $this->urlThumbnail, $this->ISBM10 ,$this->ISBM13, $this->pagesCount);
    }
}