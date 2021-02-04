<?php

namespace Tests\Unit\Value\DateOfBirth;

use AttractionsIo\Exception\ValidationException;
use AttractionsIo\Value\DateOfBirth;

class ValidateTest extends TestCase
{
    /**
     * @test
     */
    public function positive()
    {
        $dob = new DateOfBirth("1991-02-03");

        $this->assertTrue($dob->validate());
    }

    /**
     * @test
     */
    public function negative()
    {
        $dob = new DateOfBirth("2020-10-20");

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("User must be atleast 13 years old");

        $dob->validate();
    }
}
