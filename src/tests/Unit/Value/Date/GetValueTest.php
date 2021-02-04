<?php

namespace Tests\Unit\Value\Date;

use AttractionsIo\Value\Date;

class GetValueTest extends TestCase
{
    /**
     * @test
     */
    public function positive()
    {
        $date = new Date("2021-01-04");

        $this->assertEquals("2021-01-04", $date->getValue());
    }
}
