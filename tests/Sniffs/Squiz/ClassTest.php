<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ClassTest extends SniffTestCase
{
    protected function setUp(): void
    {
        $this->excludes[] = 'PSR1.Classes.ClassDeclaration.MissingNamespace';
    }

    public function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(8, 'Squiz.WhiteSpace.FunctionSpacing.After'),
          ],
        ];
    }
}
