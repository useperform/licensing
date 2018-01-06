<?php

namespace Perform\Licensing\Tests;

use Perform\Licensing\ValidateResponse;
use Perform\Licensing\Exception\LicensingException;

/**
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ValidateResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $response = new ValidateResponse([
            'valid' => true
        ]);
        $this->assertTrue($response->isValid());
    }

    public function testNotValid()
    {
        $response = new ValidateResponse([
            'valid' => false
        ]);
        $this->assertFalse($response->isValid());
    }

    public function testGetDomains()
    {
        $response = new ValidateResponse([
            'valid' => false,
            'domains' => ['example.com', 'example.co.uk'],
        ]);
        $this->assertSame(['example.com', 'example.co.uk'], $response->getDomains());
    }

    public function testInvalidResponseThrowsException()
    {
        $this->setExpectedException(LicensingException::class);
        new ValidateResponse([]);
    }
}
