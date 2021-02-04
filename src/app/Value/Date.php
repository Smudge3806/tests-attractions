<?php

namespace AttractionsIo\Value;

/**
 * Date
 *
 * @package AttractionsIO
 * @author  Chris Smith <smudge3806@live.co.uk>
 */
class Date extends ValueObject
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
}
