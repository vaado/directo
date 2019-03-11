<?php

namespace Directo;

class DirectoXMLParser
{

    /**
     * Response parser.
     *
     * @param \Directo\DirectoClient $response
     * @return \SimpleXMLElement
     */
    public function parseResponse($response)
    {
        return new \SimpleXMLElement($response->getBody()->getContents());
    }

    /**
     * Returns key values mapped data field array
     *
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
     * Returns data field value by code.
     *
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

    /**
     * Returns attribute value.
     *
     * @param $obj
     * @param $att
     * @return mixed
     */
    public function getAttributeValue($obj, $att)
    {
        $attribute = $obj->attributes()
            ->$att;
        if (isset($attribute)) {
            return $attribute->__toString();
        }

        return false;
    }
}