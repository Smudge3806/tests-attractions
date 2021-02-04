<?php

namespace Tests\Unit\Value\Password;

use AttractionsIo\Exception\ValidationException;
use AttractionsIo\Value\Password;

class ValidateTest extends TestCase
{
    /**
     * @test
     */
    public function positive()
    {
        $password = new Password('password');

        $this->assertTrue($password->validate());
    }

    /**
     * @test
     */
    public function negative()
    {
        $password = new Password(str_pad('password', 33, 'd'));

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Password must be less than 33 characters');

        $password->validate();
    }
}
