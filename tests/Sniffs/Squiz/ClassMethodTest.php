<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ClassMethodTest extends SniffTestCase
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
            new ErrorData(5, 'PSR12.Classes.OpeningBraceSpace.Found'),
            new ErrorData(8, 'Squiz.WhiteSpace.FunctionSpacing.BeforeFirst'),
            new ErrorData(10, 'Squiz.WhiteSpace.FunctionSpacing.AfterLast'),
            new ErrorData(13, 'PSR2.Classes.ClassDeclaration.CloseBraceAfterBody'),

            new ErrorData(15, 'PSR12.Classes.OpeningBraceSpace.Found'),
            new ErrorData(19, 'Squiz.WhiteSpace.FunctionSpacing.BeforeFirst'),

            new ErrorData(24, 'PSR12.Classes.OpeningBraceSpace.Found'),
            new ErrorData(28, 'Squiz.WhiteSpace.FunctionSpacing.BeforeFirst'),

            new ErrorData(33, 'PSR12.Classes.OpeningBraceSpace.Found'),
            new ErrorData(39, 'Squiz.WhiteSpace.FunctionSpacing.BeforeFirst'),

            new ErrorData(44, 'PSR12.Classes.OpeningBraceSpace.Found'),

            new ErrorData(58, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(61, 'Squiz.WhiteSpace.FunctionSpacing.After'),

            new ErrorData(74, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(78, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(84, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(86, 'Squiz.WhiteSpace.FunctionSpacing.After'),

            new ErrorData(99, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(103, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(109, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(111, 'Squiz.WhiteSpace.FunctionSpacing.After'),

            new ErrorData(125, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(130, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(139, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(141, 'Squiz.WhiteSpace.FunctionSpacing.After'),

            new ErrorData(154, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(156, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(159, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(161, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(170, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
            new ErrorData(172, 'Squiz.WhiteSpace.FunctionSpacing.After'),
            new ErrorData(177, 'Squiz.WhiteSpace.FunctionSpacing.Before'),
          ],
        ];
    }
}
