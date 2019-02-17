<?php

namespace Directo;

class Request extends Directo {

    /**
     * @param $type
     * @return SimpleXMLElement
     */
    public function get($type)
    {
        $url = $this->getResourceUrl($type);

        return simplexml_load_file($url);
    }

}