<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;

final class ComparisonOperatorUsageTest extends SniffTestCase
{
    public static function provideTestData(): Iterator
    {
      // Allow ! operator
        yield[];
    }
}
