<?php

namespace Myxobek\PhpDesignPatterns\Strategy;

interface HashStrategy
{
    public function getHash( $secret );
}