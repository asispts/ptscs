<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ComparisonOperatorUsageTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
      // Allow ! operator
        yield[
          [],
        ];
    }
}
