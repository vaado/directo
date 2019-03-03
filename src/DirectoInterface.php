<?php

namespace Directo;

interface DirectoInterface {

    public function setAccountName($value);

    public function getAccountName();

    public function setPrivateKey($value);

    public function getPrivateKey();

    public function getResourceURL($type);

}