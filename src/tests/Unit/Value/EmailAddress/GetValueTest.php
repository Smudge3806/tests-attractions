<?php

namespace Tests\Unit\Value\EmailAddress;

use AttractionsIo\Value\EmailAddress;

class GetValueTest extends TestCase
{
    /**
     * @test
     */
    public function positive()
    {
        $this->assertEquals(
            "email@example.com",
            (new EmailAddress("email@example.com"))->getValue()
        );
    }
}
