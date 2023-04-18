<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Slevomat\StrictTypes;

use Iterator;
use Ptscs\Tests\SniffTestCase;
use Ptscs\Tests\Utils\ErrorData;

final class FormatDeclareTest extends SniffTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setExclude([]);
    }

    public static function provideTestData(): Iterator
    {
        yield[
          [
            new ErrorData(5, 'SlevomatCodingStandard.TypeHints.DeclareStrictTypes.IncorrectWhitespaceBeforeDeclare'),
          ],
          [
            new ErrorData(5, 'Generic.Formatting.MultipleStatementAlignment.IncorrectWarning'),
          ],
        ];
    }
}
