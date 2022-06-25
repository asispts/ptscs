<?php declare(strict_types=1);

namespace Ptscs\Tests;

use Iterator;
use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Ruleset;
use PHPUnit\Framework\TestCase;
use Ptscs\Tests\Utils\ErrorData;

abstract class SniffTestCase extends TestCase
{
    abstract public function provideTestData(): Iterator;

    private function assertSniff(ErrorData $data, array $lines): void
    {
        foreach ($lines as $columns) {
            foreach ($columns as $item) {
                if (substr($item['source'], 0, strlen($data->rule)) === $data->rule) {
                    return;
                }
            }
        }

        $this->fail(sprintf("Cannot find rule '%s' in line '%d'", $data->rule, $data->line));
    }

    protected function loadFile(): LocalFile
    {
        $names = explode('\\', static::class);
        $filename = str_replace('Test', '', array_pop($names));
        $paths = [__DIR__,  ...array_slice($names, 2), '_data', $filename . '.php.inc'];
        $testFile = implode(DIRECTORY_SEPARATOR, $paths);

        $this->assertFileExists($testFile);

        $config = new Config();
        $config->standards = ['ptscs'];

        $ruleset = new Ruleset($config);
        $phpcs = new LocalFile($testFile, $ruleset, $config);
        $phpcs->process();

        return $phpcs;
    }

    /**
     * @dataProvider provideTestData
     *
     * @param ErrorData[] $errorData
     * @param ErrorData[] $warningData
     */
    public function test_sniffs(array $errorData = [], array $warningData = []): void
    {
        $phpcs = $this->loadFile();

        $errorCount = count($errorData);
        $warningCount = count($warningData);

        $this->assertSame($errorCount, $phpcs->getErrorCount(), 'errorCount');
        $this->assertSame($warningCount, $phpcs->getWarningCount(), 'warningCount');

        if ($errorCount > 0) {
            $this->check($errorData, $phpcs->getErrors());
        }

        if ($warningCount > 0) {
            $this->check($warningData, $phpcs->getWarnings());
        }
    }
    /**
     * @param ErrorData[] $data
     */
    private function check(array $data, array $phpcsData): void
    {
        foreach ($data as $item) {
            $this->assertArrayHasKey($item->line, $phpcsData, 'lines: ' . implode(', ', array_keys($phpcsData)));
            $this->assertSniff($item, $phpcsData[$item->line]);
        }
    }
}
