<?php

namespace Directo;

class Customer {

    /**
     * Returns customers output XML.
     *
     * @param $customerArray
     * @return mixed
     */
    public function generateXml($customerArray)
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><customers/>');
        $customer = $xml->addChild('customer');

        foreach ($customerArray as $key => $attr) {
            $customer->addAttribute($key, $attr);
        }

        return $xml->asXML();
    }
}