<?php declare(strict_types=1);

namespace Ptscs\Tests\Utils;

final class ErrorData
{
    /**
     * @var int
     */
    public $line;

    /**
     * @var string
     */
    public $rule;

    /**
     * @var string|null
     */
    public $message = null;

    public function __construct(int $line, string $rule, ?string $message = null)
    {
        $this->line    = $line;
        $this->rule    = $rule;
        $this->message = $message;
    }
}
