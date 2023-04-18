<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\CodeAnalysis;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class UnnecessaryFinalModifierTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude([
          'Squiz.Classes.ClassFileName.NoMatch',
          'PSR1.Classes.ClassDeclaration.MultipleClasses',
          'SlevomatCodingStandard.Classes.RequireAbstractOrFinal',
        ]);
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [],
          [
            new ErrorData(7, 'Generic.CodeAnalysis.UnnecessaryFinalModifier.Found'),
            new ErrorData(14, 'Generic.CodeAnalysis.UnnecessaryFinalModifier.Found'),
          ],
        ];
    }
}
