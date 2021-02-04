<?php

namespace AttractionsIo\Value;

use AttractionsIo\Exception\ValidationException;

/**
 * EmailAddress
 *
 * @package AttractionsIO
 * @author  Chris Smith <smudge3806@live.co.uk>
 */
class EmailAddress extends ValueObject
{
    /**
     * Get Value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Validate
     *
     * @throws ValidationException
     *
     * @return bool
     */
    public function validate()
    {
        if (strlen($this->value) > 254) {
            throw new ValidationException("Email must be less than 255 characters");
        }

        if (! filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException("Email must be a valid email");
        }

        return true;
    }
}
