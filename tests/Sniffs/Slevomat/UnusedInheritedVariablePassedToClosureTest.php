<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class UnusedInheritedVariablePassedToClosureTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude(['Squiz.Classes.ClassFileName.NoMatch']);
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(9, 'SlevomatCodingStandard.Functions.UnusedInheritedVariablePassedToClosure.UnusedInheritedVariable'), // phpcs:ignore
          ],
        ];
    }
}
