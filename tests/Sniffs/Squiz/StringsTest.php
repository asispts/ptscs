<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class StringsTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(4, 'Squiz.Strings.ConcatenationSpacing.PaddingFound'),
            new ErrorData(5, 'Squiz.Strings.ConcatenationSpacing.PaddingFound'),
            new ErrorData(7, 'Squiz.Strings.ConcatenationSpacing.PaddingFound'),
            new ErrorData(11, 'Squiz.Strings.ConcatenationSpacing.PaddingFound'),
            new ErrorData(14, 'Squiz.Strings.ConcatenationSpacing.PaddingFound'),
          ],
        ];
    }
}
