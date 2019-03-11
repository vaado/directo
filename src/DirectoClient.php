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
     * HTTP get request.
     *
     * @param $type
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($type)
    {
        $client = new Client();
        $url = $this->directo->getResourceUrl($type);

        return $client->request('GET', $url);
    }

    /**
     * HTTP Post request.
     *
     * @param $xml
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($xml)
    {
        $client = new Client();
        $url = $this->directo->getPostURL();
        $options = [
            'headers' => [
                'Content-Type' => 'text/xml; charset=UTF8',
            ],
            'body' => $xml,
        ];

        return $client->request('POST', $url, $options);
    }
}