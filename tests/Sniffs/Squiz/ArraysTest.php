<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ArraysTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->appendExclude('Generic.PHP.RequireStrictTypes');
        $this->appendExclude('PSR1.Files.SideEffects.FoundWithSymbols');
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(4, 'Squiz.Arrays.ArrayBracketSpacing.SpaceBeforeBracket'),
            new ErrorData(6, 'Squiz.Arrays.ArrayBracketSpacing.SpaceAfterBracket'),
            new ErrorData(8, 'Squiz.Arrays.ArrayBracketSpacing.SpaceBeforeBracket'),

            new ErrorData(12, 'Squiz.WhiteSpace.OperatorSpacing.SpacingAfter'),

            new ErrorData(13, 'Generic.Arrays.ArrayIndent.KeyIncorrect'),
            new ErrorData(14, 'Generic.Arrays.ArrayIndent.KeyIncorrect'),
            new ErrorData(15, 'Generic.Arrays.ArrayIndent.KeyIncorrect'),

            new ErrorData(16, 'Generic.Arrays.ArrayIndent.CloseBraceIncorrect'),

            new ErrorData(20, 'Squiz.Arrays.ArrayDeclaration.DoubleArrowNotAligned'),
            new ErrorData(21, 'Generic.Arrays.ArrayIndent.KeyIncorrect'),
            new ErrorData(22, 'Generic.Arrays.ArrayIndent.KeyIncorrect'),
            new ErrorData(23, 'Generic.Arrays.ArrayIndent.KeyIncorrect'),
            new ErrorData(24, 'Generic.Arrays.ArrayIndent.CloseBraceIncorrect'),
            new ErrorData(25, 'Generic.Arrays.ArrayIndent.CloseBraceIncorrect'),

            new ErrorData(30, 'Generic.WhiteSpace.ScopeIndent.IncorrectExact'),
            new ErrorData(31, 'Squiz.Arrays.ArrayDeclaration.DoubleArrowNotAligned'),
            new ErrorData(32, 'Generic.Arrays.ArrayIndent.KeyIncorrect'),
            new ErrorData(33, 'Generic.Arrays.ArrayIndent.KeyIncorrect'),
            new ErrorData(34, 'Generic.Arrays.ArrayIndent.CloseBraceIncorrect'),

            new ErrorData(38, 'Squiz.Arrays.ArrayDeclaration.SpaceBeforeDoubleArrow'),
            new ErrorData(41, 'Squiz.Arrays.ArrayDeclaration.SpaceAfterDoubleArrow'),
          ],
        ];
    }
}
