<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class CommentedOutCodeTest extends SniffTestCase
{
    private const RULE = 'Squiz.PHP.CommentedOutCode';

    public function provideTestData(): Iterator
    {
        $err = new ErrorData(3, 0, self::RULE, 'is this commented out code?');
        yield[[], [$err]];
    }
}
