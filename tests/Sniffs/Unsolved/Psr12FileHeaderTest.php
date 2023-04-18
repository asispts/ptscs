<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Unsolved;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class Psr12FileHeaderTest extends SniffTestCase
{
    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(3, 'PSR12.Files.FileHeader.IncorrectOrder'),
          ],
        ];
    }
}
