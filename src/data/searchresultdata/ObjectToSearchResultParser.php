<?php

namespace App\Data\SearchResultData;

use App\Data\BookData\ObjectToBookParser;
use App\Data\ObjectParser;

class ObjectToSearchResultParser implements ObjectParser {

    private const NB_ELEM_RESULT = "totalItems";
    private const BOOKS_ARRAY = "items";

    public static function parseObject(mixed $jsonObject): SearchResult {
        $nbElemResult = intval($jsonObject->{self::NB_ELEM_RESULT});
        $booksTab = array();
        $booksTabObject = (array) $jsonObject->{self::BOOKS_ARRAY};

        foreach ($booksTabObject as $bookObject) {
            $booksTab[] = ObjectToBookParser::parseObject($bookObject);
        }

        return new SearchResult($booksTab, $nbElemResult);
    }
}