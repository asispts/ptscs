<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ComparisonOperatorUsageTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(3, 'Squiz.Operators.ComparisonOperatorUsage.ImplicitTrue'),
            new ErrorData(6, 'Squiz.Operators.ComparisonOperatorUsage.NotAllowed'),
          ],
        ];
    }
}
