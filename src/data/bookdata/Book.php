<?php

namespace App\Data\BookData;

use App\Data\JsonSerializable;
use DateTime;

class Book implements JsonSerializable {
    private string $title;
    private string $subtitle;
    private array $authors;
    private string $language;
    private string $type;
    private array $thematic;
    private DateTime $publicationDate;
    private string $urlThumbnail;
    private string $ISBM10;
    private string $ISBM13;
    private string $pagesCount;
    private static string $DATE_FORMAT = "d-m-Y";

    public function __construct(string $title, string $subtitle, array $authors, string $language, string $type, array $thematic, DateTime $publicationDate, string $urlThumbnail, string $ISBM10, string $ISBM13, string $pagesCount) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->authors = $authors;
        $this->language = $language;
        $this->type = $type;
        $this->thematic = $thematic;
        $this->publicationDate = $publicationDate;
        $this->urlThumbnail = $urlThumbnail;
        $this->ISBM10 = $ISBM10;
        $this->ISBM13 = $ISBM13;
        $this->pagesCount = $pagesCount;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getSubtitle(): string {
        return $this->subtitle;
    }

    public function getAuthors(): array {
        return $this->authors;
    }

    public function getLanguage(): string {
        return $this->language;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getThematic(): array {
        return $this->thematic;
    }

    public function getPublicationDate(): DateTime {
        return $this->publicationDate;
    }

    public function getUrlThumbnail(): string {
        return $this->urlThumbnail;
    }

    public function getISBM10(): string {
        return $this->ISBM10;
    }
    public function getISBM13(): string {
        return $this->ISBM13;
    }

    public function getPagesCount(): string {
        return $this->pagesCount;
    }

    public static function getDATEFORMAT(): string {
        return self::$DATE_FORMAT;
    }

    public function toJson(): string {
        return "{" .
            "title='" . $this->title . '\'' .
            "subtitle='" . $this->subtitle . '\'' .
            ", author='" . json_encode($this->authors) . '\'' .
            ", language='" . $this->language . '\'' .
            ", type='" . $this->type . '\'' .
            ", thematic='" . json_encode($this->thematic) . '\'' .
            ", publicationDate='" . $this->publicationDate->format(self::$DATE_FORMAT) . '\'' .
            ", urlThumbnail='" . $this->urlThumbnail . '\'' .
            ", ISBM10='" . $this->ISBM10 . '\'' .
            ", ISBM13='" . $this->ISBM13 . '\'' .
            "pageCount='" . $this->pagesCount . '\'' .
            '}';

    }
}
