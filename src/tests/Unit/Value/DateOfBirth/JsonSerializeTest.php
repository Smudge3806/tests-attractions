<?php

namespace Tests\Unit\Value\DateOfBirth;

use AttractionsIo\Value\DateOfBirth;

class JsonSerializeTest extends TestCase
{
    /**
     * @test
     */
    public function positive()
    {
        $dob = new DateOfBirth('1991-02-03');

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'absolute' => '1991-02-03',
                'relative' => $this->getAge('1991-02-03'),
            ]),
            json_encode($dob)
        );
    }
}
