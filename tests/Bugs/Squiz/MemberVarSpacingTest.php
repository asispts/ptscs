<?php declare(strict_types=1);

namespace Ptscs\Tests\Bugs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class MemberVarSpacingTest extends SniffTestCase
{
    protected function setUp(): void
    {
        $this->appendExclude('Squiz.Classes.ClassFileName');
    }

    public static function provideTestData(): Iterator
    {
        yield [
          [
            new ErrorData(6, 'Squiz.WhiteSpace.MemberVarSpacing.AfterComment'),
            new ErrorData(8, 'Squiz.WhiteSpace.MemberVarSpacing.AfterComment'),
            new ErrorData(12, 'Squiz.WhiteSpace.MemberVarSpacing.AfterComment'),
            new ErrorData(16, 'Squiz.WhiteSpace.MemberVarSpacing.Incorrect'),
            new ErrorData(23, 'Squiz.WhiteSpace.MemberVarSpacing.AfterComment'),
            new ErrorData(28, 'Squiz.WhiteSpace.MemberVarSpacing.Incorrect'),
          ],
        ];
    }
}
