<?php

namespace Myxobek\PhpDesignPatterns;

class StrategyChecker
{
    private $login;
    private $secret;

    public function __construct( $login, $secret )
    {
        $this->login    = $login;
        $this->secret   = $secret;
    }

    public function getDigitalSign( $strategy )
    {
        return $strategy->getHash( $this->secret );
    }

    public function getAuthString( $strategy )
    {
        return $this->login . '|' . $this->getDigitalSign( $strategy );
    }
}


