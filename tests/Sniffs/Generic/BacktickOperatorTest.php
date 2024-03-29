<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Generic;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class BacktickOperatorTest extends SniffTestCase
{
    public static function provideTestData(): Iterator
    {
        yield [
          [new ErrorData(3, 'Generic.PHP.BacktickOperator.Found')],
        ];
    }
}
