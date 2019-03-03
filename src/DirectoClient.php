<?php

namespace Directo;

use GuzzleHttp\Client;

class DirectoClient {

    private $directo;

    /**
     * DirectoClient constructor.
     * @param Directo $directo
     */
    public function __construct(Directo $directo)
    {
        $this->directo = $directo;
    }

    /**
     * @param $type
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($type)
    {
        $url = $this->directo->getResourceUrl($type);
        $client = new Client();

        return $client->request('GET', $url);
    }

}