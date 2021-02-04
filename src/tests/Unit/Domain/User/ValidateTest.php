<?php

namespace Tests\Unit\Domain\User;

use AttractionsIo\Domain\User;
use AttractionsIo\Exception\ValidationException;
use AttractionsIo\Value\DateOfBirth;
use AttractionsIo\Value\EmailAddress;
use AttractionsIo\Value\Password;
use Mockery;

class ValidateTest extends TestCase
{
    private $mock_dob;

    private $mock_email;

    private $mock_password;

    public function setUp(): void
    {
        parent::setUp();

        ($this->mock_dob = Mockery::mock(DateOfBirth::class));

        ($this->mock_email = Mockery::mock(EmailAddress::class));

        ($this->mock_password = Mockery::mock(Password::class));

        foreach ([$this->mock_dob, $this->mock_email, $this->mock_password] as $mock) {
            $mock->shouldReceive('validate')
                ->once()
                ->andReturnTrue();
        }
    }

    /**
     * @test
     */
    public function positive()
    {
        $user = new User(
            'Tony',
            'Stark',
            $this->mock_dob,
            $this->mock_email,
            $this->mock_password
        );

        $this->assertTrue($user->validate());
    }

    /**
     * @test
     * @dataProvider providesNegativeScenarios
     */
    public function negative($first_name, $last_name, $message)
    {
        $user = new User(
            $first_name,
            $last_name,
            $this->mock_dob,
            $this->mock_email,
            $this->mock_password
        );

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage($message);

        $user->validate();
    }

    public function providesNegativeScenarios()
    {
        return [
            'first name too long' => [
                str_pad('Tony', 33, 'y'),
                'Stark',
                'First name must be less than 33 characters'
            ],
            'last name too long' => [
                'Tony',
                str_pad('Stark', 33, 'k'),
                'Last name must be less than 33 characters'
            ],
        ];
    }
}
