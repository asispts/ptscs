<?php declare(strict_types=1);

namespace App;

interface IFoobar
{
    public function ifunction(int $id): void;
}

abstract class AbstractFoobar
{
    abstract protected function afunction(int $id): void;
}

final class Foobar
{
    public function ifunction(int $id): void
    {
    }

    protected function afunction(int $id): void
    {
    }

    public function foo(int $id): void
    {
    }
}
