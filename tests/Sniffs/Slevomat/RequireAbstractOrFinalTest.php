<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class RequireAbstractOrFinalTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude(['Squiz.Classes.ClassFileName.NoMatch', 'PSR1.Classes.ClassDeclaration.MultipleClasses']);
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(5, 'SlevomatCodingStandard.Classes.RequireAbstractOrFinal'),
            new ErrorData(9, 'SlevomatCodingStandard.Classes.RequireAbstractOrFinal'),
          ],
        ];
    }
}
