<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class UnusedParameterTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude([
          'Squiz.Classes.ClassFileName.NoMatch',
          'PSR1.Classes.ClassDeclaration.MultipleClasses',
        ]);
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(17, 'SlevomatCodingStandard.Functions.UnusedParameter'),
            new ErrorData(21, 'SlevomatCodingStandard.Functions.UnusedParameter'),
            new ErrorData(25, 'SlevomatCodingStandard.Functions.UnusedParameter'),
          ],
        ];
    }
}
