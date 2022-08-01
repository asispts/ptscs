<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class UnusedUseTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->excludes = ['Squiz.Classes.ClassFileName.NoMatch'];
    }

    public function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(5, 'SlevomatCodingStandard.Namespaces.UnusedUses'),
          ],
        ];
    }
}
