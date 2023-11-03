<?php declare(strict_types=1);

namespace App;

final class Foobar
{
    /**
     * @var string
     */
    private $value;

    /**
     * Class constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
