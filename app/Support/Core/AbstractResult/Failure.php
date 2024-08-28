<?php

namespace App\Support\Core\AbstractResult;

use Throwable;

class Failure extends AbstractResult
{
    /**
     * Define the Exception
     *
     * @var Throwable
     */
    protected Throwable $throwable;

    /**
     * @param Throwable $throwable
     */
    public function __construct(Throwable $throwable)
    {
        $this->throwable = $throwable;
    }

    /**
     * @return Throwable
     */
    public function get(): Throwable
    {
        return $this->throwable;
    }

    public function isFailure(): bool
    {
        return true;
    }

    public function isSuccess(): bool
    {
        return false;
    }
}
