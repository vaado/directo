<?php

namespace Directo;

class Directo {

    /**
     * @var string base URL.
     */
    const DIRECTO_BASE_URL = 'https://directo.gate.ee/xmlcore';

    /**
     * @var string Account Name.
     */
    private $accountName;

    /**
     * @var string Private Key.
     */
    private $privateKey;

    /**
     * Directo client constructor.
     *
     * @param string $accountName Account Name, NULL if not provided
     * @param string $privateKey Private Key, NULL if not provided
     * @return void
     */
    public function __construct($accountName = NULL, $privateKey = NULL)
    {
        $this->setAccountName($accountName);
        $this->setPrivateKey($privateKey);
    }

    /**
     * Set Account Name.
     *
     * @param string $value
     * @return void
     */
    public function setAccountName($value)
    {
        $this->accountName = $value;
    }

    /**
     * Get Account Name.
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * Set Private Key.
     *
     * @param string $value
     * @return void
     */
    public function setPrivateKey($value)
    {
        $this->privateKey = $value;
    }

    /**
     * Get Private Key.
     *
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    public function getItemURL()
    {
        return $this->getResourceURL('item');
    }

    /**
     * Returns full resource URL.
     *
     * @param $type
     * @return string
     */
    public function getResourceURL($type)
    {
        return self::DIRECTO_BASE_URL.'/'.
            $this->accountName.'/xmlcore.asp?get=1&what='.$type.'&key='.
            $this->privateKey;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getItemXML()
    {
        $itemsUrl = $this->getItemURL();

        return simplexml_load_file($itemsUrl);
    }
}