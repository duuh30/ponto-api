<?php

namespace App\Support\Core\AbstractResult;

/**
 *
 * @template T
 */
abstract class AbstractResult
{
    /**
     * @return T
     */
    abstract public function get();
    abstract public function isFailure(): bool;
    abstract public function isSuccess(): bool;

}
