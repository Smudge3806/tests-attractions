<?php

namespace AttractionsIo\Exception;

use DomainException;
use Throwable;

/**
 * Validation Exception
 *
 * @package AttractionsIO
 * @author  Chris Smith <smudge3806@live.co.uk>
 */
class ValidationException extends DomainException
{
    /**
     * ValidationException
     *
     * @param string         $message  Exception message
     * @param int            $code     Exception status code
     * @param Throwable|null $previous Previous exception
     */
    public function __construct(string $message, int $code = 422, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
