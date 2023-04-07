<?php

namespace App\data\book;

use App\Data\JsonSerializable;
use DateTime;

class Book implements JsonSerializable {
    private string $title;
    private string $subtitle;
    private array $author;
    private string $language;
    private string $type;
    private array $thematic;
    private DateTime $publicationDate;
    private string $urlThumbnail;
    private string $ISBM;
    private int $pagesCount;
    private static string $DATE_FORMAT = "2000-01-01";

    public function __construct(string $title, string $subtitle, array $author, string $language, string $type, array $thematic, DateTime $publicationDate, string $urlThumbnail, string $ISBM, int $pagesCount) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->author = $author;
        $this->language = $language;
        $this->type = $type;
        $this->thematic = $thematic;
        $this->publicationDate = $publicationDate;
        $this->urlThumbnail = $urlThumbnail;
        $this->ISBM = $ISBM;
        $this->pagesCount = $pagesCount;
    }


    public function toJson(): string {
        return "{" .
            "title='" . $this->title . '\'' .
            "subtitle='" . $this->subtitle . '\'' .
            ", author='" . json_encode($this->author) . '\'' .
            ", language='" . $this->language . '\'' .
            ", type='" . $this->type . '\'' .
            ", thematic='" . json_encode($this->thematic) . '\'' .
            ", publicationDate='" . $this->publicationDate->format(self::$DATE_FORMAT) . '\'' .
            ", urlThumbnail='" . $this->urlThumbnail . '\'' .
            ", ISBM='" . $this->ISBM . '\'' .
            "pageCount='" . $this->pagesCount . '\'' .
            '}';

    }
}
