<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ClassTest extends SniffTestCase
{
    protected function setUp(): void
    {
        $this->setExclude(['Squiz.Classes.ClassFileName']);
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(4, 'SlevomatCodingStandard.TypeHints.DeclareStrictTypes'),
            new ErrorData(5, 'SlevomatCodingStandard.Namespaces.NamespaceSpacing'),
            new ErrorData(7, 'SlevomatCodingStandard.Namespaces.UseSpacing'),
            new ErrorData(9, 'PSR2.Classes.ClassDeclaration.ExtendsLine'),
            new ErrorData(10, 'PSR2.Classes.ClassDeclaration.ImplementsLine'),
            new ErrorData(12, 'PSR12.Traits.UseDeclaration.NoBlankLineAfterUse'),
            new ErrorData(15, 'Squiz.WhiteSpace.MemberVarSpacing.Incorrect'),
            new ErrorData(16, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
          ],
        ];
    }
}
