<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\PEAR;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class BracketsNotRequiredTest extends SniffTestCase
{
    public static function provideTestData(): Iterator
    {
        yield[[new ErrorData(3, 'PEAR.Files.IncludingFile.BracketsNotRequired')]];
    }
}
