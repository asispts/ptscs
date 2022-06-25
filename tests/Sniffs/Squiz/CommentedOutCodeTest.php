<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class CommentedOutCodeTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
        yield[[], [new ErrorData(3, 'Squiz.PHP.CommentedOutCode')]];
    }
}
