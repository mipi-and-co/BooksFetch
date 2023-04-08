<?php

namespace App\wrappers;

use App\Data\SearchResultData\ObjectToSearchResultParser;
use App\Data\SearchResultData\SearchResult;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GoogleBooksWrappers {
    private Client $gruzzleClient;
    private string $apiKey;
    private string $apiKeyUriParams;
    private const SEARCH_BY_TITLE = "v1/volumes?q=intitle:%s";
    private const NB_ELEM_BY_REQUEST = 50;

    public function __construct(Client $gruzzleClient, string $apiKey) {
        $this->gruzzleClient = $gruzzleClient;
        $this->apiKey = $apiKey;
        $this->apiKeyUriParams = "&key=" . $apiKey;
    }

    public function fetchBooksDataByTitle(string $author): SearchResult  {
        $formattedAuthor = $this->formattedString($author);
        $uri = sprintf(self::SEARCH_BY_TITLE, $formattedAuthor) . $this->apiKeyUriParams;

        $response = $this->gruzzleClient->request("GET", $uri);

        return $this->parseResponseToSearchResult($response);
    }

    private function replaceSpaceByPlus(string $str): string {
        return str_replace(array(" "), "+", $str);
    }

    private function formattedString(string $str): string {
        $strFormatted = $this->replaceSpaceByPlus($str);
        return utf8_encode($strFormatted);
    }

    private function parseResponseToSearchResult(ResponseInterface $res): SearchResult {
        $dataObject = json_decode($res->getBody()->getContents());

        return ObjectToSearchResultParser::parseObject($dataObject);
    }
}