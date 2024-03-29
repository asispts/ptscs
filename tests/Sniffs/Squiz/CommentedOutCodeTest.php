<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class CommentedOutCodeTest extends SniffTestCase
{
    public static function provideTestData(): Iterator
    {
        yield[
          [], // Error data
          [ // Warning data
            new ErrorData(13, 'Squiz.PHP.CommentedOutCode', 'This comment is 75% valid code'),
          ],
        ];
    }
}
