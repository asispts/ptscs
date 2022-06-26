<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Squiz;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class ArraysTest extends SniffTestCase
{
    public function provideTestData(): Iterator
    {
        yield[[
            new ErrorData(3, 'Squiz.Arrays.ArrayBracketSpacing.SpaceBeforeBracket'),
            new ErrorData(5, 'Squiz.Arrays.ArrayBracketSpacing.SpaceAfterBracket'),
            new ErrorData(7, 'Squiz.Arrays.ArrayBracketSpacing.SpaceBeforeBracket'),
        ]];
    }
}
