<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ClassPropertyTest extends SniffTestCase
{
    protected function setUp(): void
    {
        $this->appendExclude('PSR1.Classes.ClassDeclaration.MissingNamespace');
        $this->appendExclude('Squiz.Classes.ClassFileName');
        $this->appendExclude('Generic.PHP.RequireStrictTypes.MissingDeclaration');
        $this->appendExclude('SlevomatCodingStandard.Classes.RequireAbstractOrFinal');
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(4, 'PSR12.Classes.OpeningBraceSpace.Found'),
            new ErrorData(7, 'Squiz.WhiteSpace.MemberVarSpacing.FirstIncorrect'),
            new ErrorData(10, 'PSR2.Classes.ClassDeclaration.CloseBraceAfterBody'),
            new ErrorData(13, 'Squiz.WhiteSpace.MemberVarSpacing.AfterComment'),
            new ErrorData(27, 'Squiz.WhiteSpace.MemberVarSpacing.AfterComment'),
            new ErrorData(40, 'Squiz.WhiteSpace.MemberVarSpacing.AfterComment'),
            new ErrorData(43, 'Squiz.WhiteSpace.MemberVarSpacing.Incorrect'),
          ],
        ];
    }
}
