<?php

namespace AttractionsIo\Value;

use AttractionsIo\Exception\ValidationException;

/**
 * Password
 *
 * @package AttractionsIO
 * @author  Chris Smith <smudge3806@live.co.uk>
 */
class Password extends ValueObject
{
    /**
     * Validate
     *
     * @throws ValidationException
     *
     * @return bool
     */
    public function validate()
    {
        if (strlen($this->value) > 32) {
            throw new ValidationException("Password must be less than 33 characters");
        }

        return true;
    }

    /**
     * GetValue
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * To String
     *
     * @return string
     */
    public function __toString()
    {
        return "************";
    }
}
