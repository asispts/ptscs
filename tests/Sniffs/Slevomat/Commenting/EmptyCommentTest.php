<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat\Commenting;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class EmptyCommentTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->appendExclude('Squiz.Classes.ClassFileName.NoMatch');
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(7, 'SlevomatCodingStandard.Commenting.EmptyComment.EmptyComment'),
            new ErrorData(11, 'SlevomatCodingStandard.Commenting.EmptyComment.EmptyComment'),
            new ErrorData(14, 'SlevomatCodingStandard.Commenting.EmptyComment.EmptyComment'),
          ],
        ];
    }
}
