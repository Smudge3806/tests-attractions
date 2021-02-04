<?php

namespace AttractionsIo\Domain;

use AttractionsIo\Contract\DomainEntity;
use AttractionsIo\Exception\ValidationException;
use AttractionsIo\Value\DateOfBirth;
use AttractionsIo\Value\EmailAddress;
use AttractionsIo\Value\Password;
use JsonSerializable;

/**
 * User
 *
 * @package AttractionsIO
 * @author  Chris Smith <smudge3806@live.co.uk>
 */
class User implements DomainEntity, JsonSerializable
{
    /**
     * First Name
     *
     * @var String
     */
    private $first_name;

    /**
     * Last Name
     *
     * @var String
     */
    private $last_name;

    /**
     * Date of Birth
     *
     * @var DateOfBirth
     */
    private $date_of_birth;

    /**
     * Email Address
     *
     * @var EmailAddress
     */
    private $email_address;

    /**
     * Password
     *
     * @var Password
     */
    private $password;

    /**
     * User
     *
     * @param string       $first_name    User's first name
     * @param string       $last_name     User's last name
     * @param DateOfBirth  $date_of_birth User's date of birth
     * @param EmailAddress $email_address User's email address
     * @param Password     $password      User's password
     */
    public function __construct(
        string $first_name,
        string $last_name,
        DateOfBirth $date_of_birth,
        EmailAddress $email_address,
        Password $password
    ) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
        $this->email_address = $email_address;
        $this->password = $password;
    }

    /**
     * Validate
     *
     * @throws ValidationException
     *
     * @return true
     */
    public function validate()
    {
        if (strlen($this->first_name) > 32) {
            throw new ValidationException("First name must be less than 33 characters");
        }

        if (strlen($this->last_name) > 32) {
            throw new ValidationException("Last name must be less than 33 characters");
        }

        $this->date_of_birth->validate();
        $this->email_address->validate();
        $this->password->validate();

        return true;
    }

    /**
     * JsonSerialize
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'email_address' => $this->email_address,
            'password' => (string) $this->password,
        ];
    }
}
