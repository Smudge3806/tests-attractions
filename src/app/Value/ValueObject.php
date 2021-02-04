<?php

namespace AttractionsIo\Value;

use AttractionsIo\Contract\ValueObject as ValueObjectContract;
use JsonSerializable;

/**
 * Abstract ValueObject
 *
 * @package AttractionsIO
 * @author  Chris Smith <smudge3806@live.co.uk>
 */
abstract class ValueObject implements ValueObjectContract, JsonSerializable
{
    /**
     * Value
     *
     * @var mixed
     */
    protected $value;

    /**
     * ValueObject
     *
     * @param mixed $value Underlying value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * JsonSerialize
     *
     * @return mixed
     */
    public function jsonSerialize()
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
        return $this->value;
    }
}
