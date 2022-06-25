<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Generic;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ForbiddenFunctionsTest extends SniffTestCase
{
    private const RULE = 'Generic.PHP.ForbiddenFunctions';

    public function provideTestData(): Iterator
    {
        $errors = null;
        for ($i = 3; $i <= 12; $i++) {
            $errors[] = new ErrorData($i, self::RULE);
        }

        yield[$errors];
    }
}
