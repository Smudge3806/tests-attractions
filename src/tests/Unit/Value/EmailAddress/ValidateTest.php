<?php

namespace Tests\Unit\Value\EmailAddress;

use AttractionsIo\Exception\ValidationException;
use AttractionsIo\Value\EmailAddress;

class ValidateTest extends TestCase
{
    /**
     * @test
     */
    public function positive()
    {
        $email_address = new EmailAddress("email@example.com");

        $this->assertTrue($email_address->validate());
    }

    /**
     * @test
     * @dataProvider providesNegativeScenarios
     */
    public function negative($email, $message)
    {
        $email_address = new EmailAddress($email);

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage($message);

        $email_address->validate();
    }

    public function providesNegativeScenarios()
    {
        return [
            'too long' => [
                str_pad('@example.com', 255, 'test', STR_PAD_LEFT),
                "Email must be less than 255 characters"
            ],
            'not an email' => [
                'not an email',
                "Email must be a valid email"
            ]
        ];
    }
}
