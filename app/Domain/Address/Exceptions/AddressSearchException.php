<?php

namespace App\Domain\Address\Exceptions;

use Exception;

class AddressSearchException extends Exception
{
    public static function unexpectedIntegrationError(): self
    {
        return new self('Unexpected Integration Error');
    }
}
