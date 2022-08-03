<?php declare(strict_types=1);

namespace App;

final class FooException extends Exception
{
    private $values;

    public function __construct()
    {
        $this->values = explode(DIRECTORY_SEPARATOR, __DIR__);
    }
}
