<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat\Functions;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class StaticClosureTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->appendExclude('Squiz.Classes.ClassFileName.NoMatch');
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [new ErrorData(9, 'SlevomatCodingStandard.Functions.StaticClosure.ClosureNotStatic')],
        ];
    }
}
