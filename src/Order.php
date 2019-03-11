<?php

namespace Directo;

class Order {

    /**
     * Generates orders output XML.
     *
     * @param $orderArray
     * @return mixed
     */
    public function generateOrderXml($orderArray)
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><orders/>');
        $order = $xml->addChild('order');

        foreach ($orderArray['info'] as $key => $attr) {
            $order->addAttribute($key, $attr);
        }

        $rows = $order->addChild('rows');

        foreach ($orderArray['products'] as $order_item) {
            $line = $rows->addChild('row');
            foreach ($order_item as $key => $attr) {
                $line->addAttribute($key, $attr);
            }
        }

        return $xml->asXML();
    }
}