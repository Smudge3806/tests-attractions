<?php

namespace Tests\Unit\Value\Password;

use AttractionsIo\Value\Password;

class GetValueTest extends TestCase
{
    /**
     * @test
     */
    public function positive()
    {
        $password = new Password('password');

        $this->assertEquals('password', $password->getValue());
    }
}
