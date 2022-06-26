<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ClassTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(7, 'PSR2.Classes.ClassDeclaration.ExtendsLine'),
            new ErrorData(8, 'PSR2.Classes.ClassDeclaration.ImplementsLine'),
            new ErrorData(10, 'PSR12.Traits.UseDeclaration.NoBlankLineAfterUse'),
            new ErrorData(13, 'Squiz.WhiteSpace.MemberVarSpacing.Incorrect'),
            new ErrorData(14, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
          ],
        ];
    }
}
