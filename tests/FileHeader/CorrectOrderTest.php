<?php declare(strict_types=1);

namespace Ptscs\Tests\FileHeader;

use Iterator;
use Ptscs\Tests\SniffTestCase;

final class CorrectOrderTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude(['Squiz.Classes.ClassFileName.NoMatch']);
    }

    public static function provideTestData(): Iterator
    {
        yield [];
    }
}
