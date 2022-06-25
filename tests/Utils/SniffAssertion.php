<?php declare(strict_types=1);

namespace Ptscs\Tests\Utils;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Ruleset;
use PHPUnit\Framework\Assert;

final class SniffAssertion
{
    private $phpcs;

    public function __construct(string $incfile, string $standard, array $excludes)
    {
        $config = new Config();
        $config->standards = [$standard];
        $config->exclude = $excludes;

        $ruleset = new Ruleset($config);
        $this->phpcs = new LocalFile($incfile, $ruleset, $config);
        $this->phpcs->process();
    }

    public function assertError(Assert $I, array $data): void
    {
        $this->check($I, $data, $this->phpcs->getErrors(), 'Error');
    }

    public function assertWarning(Assert $I, array $data): void
    {
        $this->check($I, $data, $this->phpcs->getWarnings(), 'Warning');
    }
    /**
     * @param ErrorData[] $expected
     */
    private function check(Assert $I, array $expected, array $actual, string $info): void
    {
        $count = count($expected);
        $I->assertSame($count, count($actual), $info . ' count');

        if ($count <= 0) {
            return;
        }

        foreach ($expected as $item) {
            $I->assertArrayHasKey($item->line, $actual, 'lines: ' . implode(', ', array_keys($actual)));
            $this->checkItem($I, $item, $actual[$item->line]);
        }
    }

    private function checkItem(Assert $I, ErrorData $error, array $lines): void
    {
        foreach ($lines as $columns) {
            foreach ($columns as $item) {
                if ($this->checkSource($I, $error, $item) === true) {
                    return;
                }
            }
        }

        $I->fail(sprintf("Cannot find rule '%s' in line '%d'", $error->rule, $error->line));
    }

    private function checkSource(Assert $I, ErrorData $error, array $item): bool
    {
        if (substr($item['source'], 0, strlen($error->rule)) !== $error->rule) {
            return false;
        }

        if ($error->message !== null) {
            $I->assertStringContainsString($error->message, $item['message']);
        }

        return true;
    }
}
