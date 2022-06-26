<?php declare(strict_types=1);

namespace Ptscs\Tests;

use Iterator;
use PHPUnit\Framework\TestCase;
use Ptscs\Tests\Utils\ErrorData;
use Ptscs\Tests\Utils\SniffAssertion;

abstract class SniffTestCase extends TestCase
{
    protected string $standard = 'ptscs';

    protected array $excludes = ['Generic.PHP.RequireStrictTypes'];

    abstract public function provideTestData(): Iterator;

    /**
     * @dataProvider provideTestData
     *
     * @param ErrorData[] $errorData
     * @param ErrorData[] $warningData
     */
    public function test_sniffs(array $errorData = [], array $warningData = []): void
    {
        $names    = explode('\\', static::class);
        $filename = str_replace('Test', '', array_pop($names));
        $paths    = [
          __DIR__,
          ...array_slice($names, 2),
          '_data',
          $filename . '.php.inc',
        ];

        $filepath = implode(DIRECTORY_SEPARATOR, $paths);

        $sniff = new SniffAssertion($filepath, $this->standard, $this->excludes);
        $sniff->assertError($this, $errorData);
        $sniff->assertWarning($this, $warningData);

        $fixedfile = str_replace('.php.inc', '.php.fixed', $filepath);
        if (file_exists($fixedfile) === true) {
            $sniff->assertFixed($this, $fixedfile);
        }
    }
}
