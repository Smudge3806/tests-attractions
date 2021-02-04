<?php

namespace Tests\Integration\User;

use AttractionsIo\Domain\User;
use AttractionsIo\Value\DateOfBirth;
use AttractionsIo\Value\EmailAddress;
use AttractionsIo\Value\Password;
use Carbon\Carbon;

class SerializeTest extends TestCase
{
    /**
     * @test
     */
    public function positive()
    {
        $user = new User(
            'Tony',
            'Stark',
            new DateOfBirth('1970-05-29'),
            new EmailAddress('ironman@avengers.org'),
            new Password('IronManRockz')
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'first_name' => 'Tony',
                'last_name' => 'Stark',
                'date_of_birth' => [
                    'absolute' => '1970-05-29',
                    'relative' => Carbon::parse('1970-05-29')->diffInYears()
                ],
                'email_address' => 'ironman@avengers.org',
                'password' => '************'
            ]),
            json_encode($user)
        );
    }
}
