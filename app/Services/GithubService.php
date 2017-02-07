<?php
/**
 * Created by Malik Abiola.
 * Date: 07/02/2017
 * Time: 14:55
 * IDE: PhpStorm
 */

namespace App\Services;


use App\Factory\GuzzleClient;

class GithubService
{
    public function getDevs($page = 1)
    {
        $guzzleClient = GuzzleClient::make();

        $response = $guzzleClient->get("/search/users?q=location:lagos+language:php?per_page=100&page={$page}");

        if ($response->getStatusCode() != 200) {
            return [];
        }

        $requestResponse = json_decode($response->getBody());
        
        $paginationLinks = $this->parsePaginationLinks($response->getHeader('Link')[0]);
        $lastPage = isset($paginationLinks['last']) ? $this->getLastPage($paginationLinks['last']) : $page;
        
        return [
            "current_page" => $page,
            "next_page" => ($page < $lastPage) ? ($page + 1) : 0,
            "prev_page" => ($page > 1) ? ($page - 1) : 0,
            "last_page" => $lastPage,
            "devs" => $requestResponse->items
        ];
    }
    
    public function parsePaginationLinks($paginationLinks)
    {
        if (empty($paginationLinks)) {
            return [];
        }
        
        $links = explode(',', $paginationLinks);
        $parsedPaginationLinks = [];
        foreach ($links as $link) {
            $linkParts = explode(";", trim($link));
            if (count($linkParts) != 2) {
                return [];
            }
    
            $explodedRel = explode("=", trim($linkParts[1]));
    
            $parsedPaginationLinks[trim($explodedRel[1], '"')] = trim(trim($linkParts[0], "<"), ">");
        }
        
        return $parsedPaginationLinks;
    }
    
    public function getLastPage($linkUrl)
    {
        list($pageInfo, $pageNumber) = explode("page=", $linkUrl);
        
        return $pageNumber;
    }
}
