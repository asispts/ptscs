<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class FunctionsTest extends SniffTestCase
{
    protected function setUp(): void
    {
        $this->appendExclude('PSR1.Files.SideEffects.FoundWithSymbols');
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(5, 'Squiz.WhiteSpace.FunctionOpeningBraceSpace.SpacingAfter'),
            new ErrorData(14, 'PSR2.Methods.FunctionClosingBrace.SpacingBeforeClose'),

            new ErrorData(20, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(23, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(30, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(35, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(43, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(50, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(54, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(58, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(60, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(66, 'Squiz.WhiteSpace.FunctionSpacing.Before'),

            new ErrorData(73, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(80, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(84, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(88, 'Squiz.WhiteSpace.FunctionSpacing.Before'),

            new ErrorData(96, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(104, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(109, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(114, 'Squiz.WhiteSpace.FunctionSpacing.Before'),

            new ErrorData(122, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(128, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(130, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(133, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(135, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(140, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
          ],
        ];
    }
}
