<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ReferenceUsedNamesOnlyTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude([
          'Squiz.Classes.ClassFileName.NoMatch',
          'SlevomatCodingStandard.Variables.UnusedVariable',
        ]);
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(7, 'SlevomatCodingStandard.Namespaces.ReferenceUsedNamesOnly'),
            new ErrorData(10, 'SlevomatCodingStandard.Namespaces.ReferenceUsedNamesOnly'),
            new ErrorData(19, 'SlevomatCodingStandard.Namespaces.ReferenceUsedNamesOnly'),
          ],
        ];
    }
}
