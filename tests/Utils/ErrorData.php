<?php declare(strict_types=1);

namespace Ptscs\Tests\Utils;

final class ErrorData
{
    public function __construct(
        public readonly int $line,
        public readonly string $rule,
    ) {
    }
}
