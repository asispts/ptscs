<?php declare(strict_types=1);

namespace App;

use const PHP_URL_QUERY;

final class FooException extends Exception
{
    private $values;

    public function __construct()
    {
        $this->values = explode(DIRECTORY_SEPARATOR, __DIR__);

        echo parse_url('localhost', PHP_URL_QUERY);
    }
}
