<?php

namespace App\Support\Core\AbstractResult;

/**
 * @template T
 *
 * @extends AbstractResult<T>
 */
class Success extends AbstractResult
{
    /**
     * Define Success Object
     *
     * @var T
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return T
     */
    public function get()
    {
        return $this->value;
    }

    public function isFailure(): bool
    {
        return false;
    }

    public function isSuccess(): bool
    {
        return true;
    }
}
