<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat\TypeHints;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class UselessDocblockTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->appendExclude('Squiz.Classes.ClassFileName.NoMatch');
    }

    public static function provideTestData(): Iterator
    {
        yield [
          [
            new ErrorData(14, 'SlevomatCodingStandard.TypeHints.ParameterTypeHint.UselessAnnotation'),
            new ErrorData(22, 'SlevomatCodingStandard.TypeHints.ReturnTypeHint.UselessAnnotation'),
          ],
        ];
    }
}
