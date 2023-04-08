<?php

namespace App\Data\BookData;

use App\Data\ObjectParser;
use DateTime;

class ObjectToBookParser implements ObjectParser {
    private const VOLUME_INFO = "volumeInfo";
    private const TITLE = "title";
    private const SUBTITLE = "subtitle";
    private const AUTHOR = "authors";
    private const PUBLISHED_DATE = "publishedDate";
    private const INDUSTRY_IDENTIFIER = "industryIdentifiers";
    private const ISBM = "identifier";
    private const PRINT_TYPE = "printType";
    private const LANGUAGE = "language";
    private const PAGES_COUNT = "pageCount";
    private const THEMATIC = "categories";
    private const IMAGES_LINKS = "imageLinks";
    private const THUMBNAIL = "thumbnail";

    public static function parseObject(mixed $jsonObject): Book {
        $bookFactory = new BookFactory();
        $volumeInfo = $jsonObject->{self::VOLUME_INFO};

        $bookFactory->setTitle($volumeInfo->{self::TITLE});

        $subtitle = $volumeInfo->{self::SUBTITLE};
        $bookFactory->setSubtitle(self::setStrEmptyIfStrIsNull($subtitle));

        $authors = $volumeInfo->{self::AUTHOR};
        $bookFactory->setTabAuthor(self::setNullArrayWithNotAvailable($authors));

        $bookFactory->setPublicationDate(self::getDateTimeFromStr($volumeInfo->{self::PUBLISHED_DATE}));

        $ISBM10 = $volumeInfo->{self::INDUSTRY_IDENTIFIER}[0]->{self::ISBM};
        $bookFactory->setISBM10(self::setStrEmptyIfStrIsNull($ISBM10));

        $ISBM13 = $volumeInfo->{self::INDUSTRY_IDENTIFIER}[1]->{self::ISBM};
        $bookFactory->setISBM13(self::setStrEmptyIfStrIsNull($ISBM13));

        $printType = $volumeInfo->{self::PRINT_TYPE};
        $bookFactory->setType(self::setStrEmptyIfStrIsNull($printType));

        $thematic = $volumeInfo->{self::THEMATIC};
        $bookFactory->setThematic(self::setNullArrayWithNotAvailable($thematic));

        $language = $volumeInfo->{self::LANGUAGE};
        $bookFactory->setLanguage(self::setStrEmptyIfStrIsNull($language));

        $pageCount = $volumeInfo->{self::PAGES_COUNT};
        $bookFactory->setPagesCount(self::setStrEmptyIfStrIsNull($pageCount));

        $urlThumbnail = $volumeInfo->{self::IMAGES_LINKS}->{self::THUMBNAIL};
        $bookFactory->setUrlThumbnail(self::setStrEmptyIfStrIsNull($urlThumbnail));

        return $bookFactory->create();
    }

    private static function getDateTimeFromStr(string|null $dateStr): DateTime {
        if ($dateStr == null) {
            return DateTime::createFromFormat(BookFactory::DATE_FORMAT_INCOMPLETE, "0000");
        }
        $dateTime = DateTime::createFromFormat(BookFactory::DATE_FORMAT_COMPLETE, $dateStr);

        if ($dateTime)
            return $dateTime;
        return DateTime::createFromFormat(BookFactory::DATE_FORMAT_INCOMPLETE, $dateStr);
    }

    private static function setStrEmptyIfStrIsNull(string|null $str) : string {
        return !is_null($str) ? $str : "";
    }

    private static function setNullArrayWithNotAvailable(array|null $array) : array {
       return !is_null($array) ? $array : array("Not Available");
    }
}