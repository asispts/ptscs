<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\PSR12;

use Iterator;
use Ptscs\Tests\SniffTestCase;

final class OpenTagTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
        yield [0,0,[]];
    }
}
