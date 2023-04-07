<?php

namespace App\Data\BookData;

use App\Data\ObjectParser;
use DateTime;

class ObjectFromBookAPIToBookParser implements ObjectParser {
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


    public static function parseObject(mixed $jsonObject): Book
    {
        $bookFactory = new BookFactory();

        $bookFactory->setTitle($jsonObject->{self::VOLUME_INFO}->{self::TITLE});
        $bookFactory->setSubtitle($jsonObject->{self::VOLUME_INFO}->{self::SUBTITLE});
        $bookFactory->setTabAuthor($jsonObject->{self::VOLUME_INFO}->{self::AUTHOR});

        $bookFactory->setPublicationDate(self::getDateTimeFromStr($jsonObject->{self::PUBLISHED_DATE}));
        $bookFactory->setISBM13($jsonObject->{self::ISBM13});
        $bookFactory->setType($jsonObject->{self::PRINT_TYPE});
        $bookFactory->setThematic($jsonObject->{self::THEMATIC});
        $bookFactory->setLanguage($jsonObject->{self::ACCESS_INFO}->{self::LANGUAGE});
        $bookFactory->setPagesCount($jsonObject->{self::PAGES_COUNT});
        $bookFactory->setUrlThumbnail($jsonObject->{self::IMAGES_LINKS}->{self::THUMBNAIL});

        return $bookFactory->create();
    }

    private static function getDateTimeFromStr(string $dateStr): DateTime {
        return DateTime::createFromFormat(BookFactory::DATE_FORMAT_RECEIVED, $dateStr);
    }
}