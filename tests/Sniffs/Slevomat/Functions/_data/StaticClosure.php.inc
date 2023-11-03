<?php declare(strict_types=1);

namespace App;

final class Foobar
{
    public function callback()
    {
        return function () {
            return 'Test';
        };
    }
}
