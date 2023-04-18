<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Generic;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ForbiddenFunctionsTest extends SniffTestCase
{
    private const RULE = 'Generic.PHP.ForbiddenFunctions';

    public static function provideTestData(): Iterator
    {
        $text = [
          'sizeof',
          'print',
          'each',
          'is_null',
          'create_function',
          'var_dump',
          'print_r',
          'debug_print_backtrace',
          'eval',
          'extract',
        ];

        $line   = 3;
        $errors = null;
        foreach ($text as $txt) {
            $errors[] = new ErrorData($line++, self::RULE, $txt . '() is forbidden');
        }

        yield[$errors];
    }
}
