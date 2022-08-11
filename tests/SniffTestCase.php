<?php declare(strict_types=1);

namespace Ptscs\Tests;

use Iterator;
use PHPUnit\Framework\TestCase;
use Ptscs\Tests\Utils\ErrorData;
use Ptscs\Tests\Utils\SniffAssertion;

abstract class SniffTestCase extends TestCase
{
    private array $excludes = [
      'SlevomatCodingStandard.TypeHints.DeclareStrictTypes',
      'SlevomatCodingStandard.Variables.UnusedVariable',
    ];

    protected string $standard = 'ptscs';

    abstract public function provideTestData(): Iterator;

    protected function setExclude(array $values): void
    {
        $this->excludes = $values;
    }

    protected function appendExclude(string $value): void
    {
        $this->excludes[] = $value;
    }

    /**
     * @dataProvider provideTestData
     *
     * @param ErrorData[] $errorData
     * @param ErrorData[] $warningData
     */
    public function test_sniffs(array $errorData = [], array $warningData = []): void
    {
        $names    = \explode('\\', static::class);
        $filename = \str_replace('Test', '', \array_pop($names));
        $paths    = [
          __DIR__,
          ...\array_slice($names, 2),
          '_data',
          $filename . '.php.inc',
        ];

        $filepath = \implode(DIRECTORY_SEPARATOR, $paths);
        $this->assertFileExists($filepath);

        $sniff = new SniffAssertion($filepath, $this->standard, $this->excludes);
        $sniff->assertError($this, $errorData);
        $sniff->assertWarning($this, $warningData);

        $fixedfile = \str_replace('.php.inc', '.php.fixed', $filepath);
        $this->assertFileExists($fixedfile);
        $sniff->assertFixed($this, $fixedfile);
    }
}
