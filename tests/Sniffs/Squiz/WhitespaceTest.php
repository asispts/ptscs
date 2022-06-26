<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class WhitespaceTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(4, 'Squiz.WhiteSpace.SemicolonSpacing.Incorrect'),
            new ErrorData(7, 'Squiz.WhiteSpace.LanguageConstructSpacing.Incorrect'),
            new ErrorData(8, 'Squiz.WhiteSpace.LanguageConstructSpacing.Incorrect'),
            new ErrorData(9, 'Squiz.WhiteSpace.LanguageConstructSpacing.Incorrect'),
            new ErrorData(12, 'Squiz.WhiteSpace.LogicalOperatorSpacing.TooMuchSpaceBefore'),
            new ErrorData(13, 'Squiz.WhiteSpace.LogicalOperatorSpacing.TooMuchSpaceAfter'),
            new ErrorData(16, 'Squiz.WhiteSpace.ObjectOperatorSpacing.Before'),
            new ErrorData(17, 'Squiz.WhiteSpace.ObjectOperatorSpacing.After'),
            new ErrorData(18, 'Squiz.WhiteSpace.ObjectOperatorSpacing.Before'),
            new ErrorData(19, 'Squiz.WhiteSpace.ObjectOperatorSpacing.After'),
          ],
        ];
    }
}
