<?php


declare(strict_types=1);
namespace Acme;use stdClass;
use Traversable;
use Stringable;
final class FooBar
extends stdClass
implements Traversable, Stringable
{
    use sometraits;
    public const KEY1 = 'value';
    public const KEY2 = 'value';
    private string $var;
    public function __toString(): string
    {
        return $this->var;
    }
}
