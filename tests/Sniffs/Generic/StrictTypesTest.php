<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Generic;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class StrictTypesTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude([]);
    }

    public function provideTestData(): Iterator
    {
        yield [[new ErrorData(1, 'Generic.PHP.RequireStrictTypes')]];
    }
}
