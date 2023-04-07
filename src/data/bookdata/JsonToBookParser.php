<?php

namespace App\Data\BookData;

use App\Data\JsonParser;
use DateTime;

class JsonFromBookAPIToBookParser implements JsonParser {
    private const VOLUME_INFO = "volumeInfo";
    private const TITLE = "title";
    private const SUBTITLE = "subtitle";
    private const AUTHOR = "authors";
    private const PUBLISHED_DATE = "publishedDate";
    private const ISBM13 = "ISBN_13";
    private const PRINT_TYPE = "printType";

    private const ACCESS_INFO = "accessInfo";
    private const LANGUAGE = "language";
    const PAGES_COUNT = "pageCount";
    private const THEMATIC = "categories";
    private const IMAGES_LINKS = "imageLinks";
    private const THUMBNAIL = "thumbnail";


    public static function parseJson(string $jsonString): object {
        $bookFactory = new BookFactory();

        $bookFactory->setTitle($jsonString->{self::VOLUME_INFO}->{self::TITLE});
        $bookFactory->setSubtitle($jsonString->{self::VOLUME_INFO}->{self::SUBTITLE});
        $bookFactory->setTabAuthor($jsonString->{self::VOLUME_INFO}->{self::AUTHOR});

        $bookFactory->setPublicationDate(self::getDateTimeFromStr($jsonString->{self::PUBLISHED_DATE}));
        $bookFactory->setISBM13($jsonString->{self::ISBM13});
        $bookFactory->setType($jsonString->{self::PRINT_TYPE});
        $bookFactory->setThematic($jsonString->{self::THEMATIC});
        $bookFactory->setLanguage($jsonString->{self::ACCESS_INFO}->{self::LANGUAGE});
        $bookFactory->setPagesCount($jsonString->{self::PAGES_COUNT});
        $bookFactory->setUrlThumbnail($jsonString->{self::IMAGES_LINKS}->{self::THUMBNAIL});

        return $bookFactory->create();
    }

    private static function getDateTimeFromStr(string $dateStr): DateTime {
        return DateTime::createFromFormat(BookFactory::DATE_FORMAT_RECEIVED, $dateStr);
    }
}