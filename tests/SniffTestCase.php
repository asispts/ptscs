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
                    $this->assertSame($data->message, $item['message']);
                    return;
                }
            }
        }

        $this->fail(sprintf("Cannot find rule '%s' in line '%d'", $data->rule, $data->line));
    }

    protected function loadFile(): LocalFile
    {
        $names = explode('\\', static::class);
        $filename = str_replace('test', '', strtolower(array_pop($names)));
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
     * @param ErrorData[] $errData
     */
    public function test_sniffs(int $errorCount, int $warningCount, array $errData): void
    {
        $phpcs = $this->loadFile();

        $this->assertSame($errorCount, $phpcs->getErrorCount());
        $this->assertSame($warningCount, $phpcs->getWarningCount());

        $errors = $phpcs->getErrors();
        foreach ($errData as $item) {
            $this->assertArrayHasKey($item->line, $errors);
            $this->assertSniff($item, $errors[$item->line]);
        }
    }
}