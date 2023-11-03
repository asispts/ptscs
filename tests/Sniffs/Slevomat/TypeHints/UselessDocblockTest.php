<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat\TypeHints;

use Iterator;
use Ptscs\Tests\SniffTestCase;

final class UselessDocblockTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->appendExclude('Squiz.Classes.ClassFileName.NoMatch');
    }

    public static function provideTestData(): Iterator
    {
        yield [];
    }
}
