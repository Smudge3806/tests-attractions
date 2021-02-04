<?php

namespace Tests\Unit\Value\DateOfBirth;

use AttractionsIo\Value\DateOfBirth;

class GetValueTest extends TestCase
{
    /**
     * @test
     */
    public function absolute()
    {
        $dob = new DateOfBirth("1991-02-03");

        $this->assertEquals("1991-02-03", $dob->getValue());
    }

    /**
     * @test
     */
    public function relative()
    {
        $dob = new DateOfBirth("1991-02-03");

        $this->assertEquals(intval($this->getAge('1991-02-03'), $dob->getValue(true));
    }
}
