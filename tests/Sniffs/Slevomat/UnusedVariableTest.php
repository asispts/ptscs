<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class UnusedVariableTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude(['SlevomatCodingStandard.TypeHints.DeclareStrictTypes']);
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(3, 'SlevomatCodingStandard.Variables.UnusedVariable'),
            new ErrorData(13, 'SlevomatCodingStandard.Variables.UnusedVariable'),
          ],
        ];
    }
}
