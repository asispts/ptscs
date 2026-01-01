<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat\Operators;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class DisallowEqualOperatorsTest extends SniffTestCase
{
    public static function provideTestData(): Iterator
    {
        yield [
          [
            new ErrorData(5, 'SlevomatCodingStandard.Operators.DisallowEqualOperators.DisallowedEqualOperator'),
          ],
        ];
    }
}
