<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Generic;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class StrictTypesTest extends SniffTestCase
{
    private const RULE = 'Generic.PHP.RequireStrictTypes';

    public function provideTestData(): Iterator
    {
        yield [[new ErrorData(1, 1, self::RULE, 'Missing required strict_types declaration')]];
    }
}
