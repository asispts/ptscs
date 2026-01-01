<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat\PHP;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class UselessSemicolonTest extends SniffTestCase
{
    public static function provideTestData(): Iterator
    {
        yield [
          [
            new ErrorData(1, 'SlevomatCodingStandard.PHP.UselessSemicolon.UselessSemicolon'),
          ],
        ];
    }
}
