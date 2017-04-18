<?php

class StrategyCheckerTest extends \PHPUnit_Framework_TestCase
{
    private $login  = 'foobar';
    private $secret = 'mY$ecRet';

    public function testFirstHash()
    {
        $strategy_checker = new \Myxobek\PhpDesignPatterns\StrategyChecker( $this->login, $this->secret );

        $mock_return_value = '12345';
        $first_hash_mock = $this->getMock( 'FirstHash', ['getHash'] );
        $first_hash_mock->expects( $this->any() )->method('getHash')->will( $this->returnValue( $mock_return_value ) );

        $this->assertEquals( $mock_return_value, $strategy_checker->getDigitalSign( $first_hash_mock ) );
        $this->assertEquals(
            $this->login . '|' . $mock_return_value,
            $strategy_checker->getAuthString( $first_hash_mock )
        );
    }

    public function testSecondHash()
    {
        $strategy_checker = new \Myxobek\PhpDesignPatterns\StrategyChecker( $this->login, $this->secret );

        $mock_return_value = '67890';
        $second_hash_mock = $this->getMock( 'FirstHash', ['getHash'] );
        $second_hash_mock->expects( $this->any() )->method('getHash')->will( $this->returnValue( $mock_return_value ) );

        $this->assertEquals( $mock_return_value, $strategy_checker->getDigitalSign( $second_hash_mock ) );
        $this->assertEquals(
            $this->login . '|' . $mock_return_value,
            $strategy_checker->getAuthString( $second_hash_mock )
        );
    }
}