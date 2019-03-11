<?php

namespace Directo;

class ClientFactory {

    /**
     * Creates Directo client.
     *
     * @param $accountName
     * @param $privateKey
     * @return DirectoClient
     */
    public function create($accountName, $privateKey)
    {
        $directo = new Directo($accountName, $privateKey);

        return new DirectoClient($directo);
    }
}