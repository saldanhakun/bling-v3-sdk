<?php

namespace Saldanhakun\Bling\Repositories;

use Saldanhakun\Bling\Client\ApiClient;

abstract class BaseRepository
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    protected $uri;

    public function __construct(ApiClient $client)
    {
        $this->apiClient = $client;
    }

    protected function request(string $method, string $uri, array $options = [])
    {
        return $this->apiClient->request($method, $uri, $options);
    }
}