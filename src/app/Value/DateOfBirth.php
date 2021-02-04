<?php

namespace AttractionsIo\Value;

use AttractionsIo\Exception\ValidationException;
use AttractionsIo\Value\Date as DateValueObject;
use Carbon\Carbon;

/**
 * DateOfBirth
 *
 * @package AttractionsIO
 * @author  Chris Smith <smudge3806@live.co.uk>
 */
class DateOfBirth extends DateValueObject
{
    /**
     * GetValue
     *
     * @param bool $relative Return the date in relative form
     *
     * @return mixed
     */
    public function getValue(bool $relative = false)
    {
        if (! $relative) {
            return $this->value;
        }

        return Carbon::parse($this->value)
            ->diffInYears();
    }

    /**
     * JsonSerialize
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'absolute' => $this->value,
            'relative' => $this->getValue(true),
        ];
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
        $age = $this->getValue(true);

        if ($age < 13) {
            throw new ValidationException("User must be atleast 13 years old");
        }

        return true;
    }
}
