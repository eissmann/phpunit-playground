<?php
declare(strict_types=1);

namespace Wtl\PhpunitTest;


abstract class AbstractSomething
{
    abstract public function rules(): array;

    public function doSomething(): bool
    {
        return count($this->rules()) > 2;
    }

    public function doSomething2(): string
    {
        return $this->doSomething() ? 'juhu' : 'bah';
    }

}