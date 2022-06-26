<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class FunctionsTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(5, 'Squiz.WhiteSpace.FunctionOpeningBraceSpace.SpacingAfter'),
            new ErrorData(14, 'PSR2.Methods.FunctionClosingBrace.SpacingBeforeClose'),
          ],
        ];
    }
}
