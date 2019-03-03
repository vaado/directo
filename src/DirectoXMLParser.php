<?php

namespace Directo;

class DirectoXMLParser
{

    /**
     * @param \Directo\DirectoClient $response
     * @return \SimpleXMLElement
     */
    public function parseResponse($response)
    {
        return new \SimpleXMLElement($response->getBody()->getContents());
    }

    /**
     * @param $item
     * @return array
     */
    public function getDataFields($item)
    {
        $datafields = [];
        if (isset($item->datafields)) {
            /** @var \SimpleXMLElement $datafield */
            foreach ($item->datafields->data as $datafield) {
                $datafields[(string)$datafield->attributes()->code] = (string)$datafield->attributes()->content;
            }
        }

        return $datafields;
    }

    /**
     * @param $item
     * @param $code
     * @return mixed
     */
    public function getDataFieldValueByCode($item, $code)
    {
        $datafields = $this->getDataFields($item);
        if (isset($datafields[$code])) {
            return $datafields[$code];
        }
    }
}