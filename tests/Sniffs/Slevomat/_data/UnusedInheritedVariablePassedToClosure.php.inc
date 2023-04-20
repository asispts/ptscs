<?php declare(strict_types=1);

namespace App;

final class Foobar
{
    public function __invoke(): callable
    {
        return function () use ($name) {
        };
    }
}
