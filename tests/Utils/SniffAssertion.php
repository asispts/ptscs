<?php declare(strict_types=1);

namespace Ptscs\Tests\Utils;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Ruleset;
use PHPUnit\Framework\Assert;

final class SniffAssertion
{
    /**
     * @var LocalFile
     */
    private $phpcs;

    /**
     * @param string[] $excludes
     */
    public function __construct(string $incfile, string $standard, array $excludes)
    {
        $config            = new Config();
        $config->standards = [$standard];
        $config->exclude   = $excludes;

        $ruleset     = new Ruleset($config);
        $this->phpcs = new LocalFile($incfile, $ruleset, $config);
        $this->phpcs->process();
    }

    /**
     * @param ErrorData[] $data
     */
    public function assertError(Assert $I, array $data): void
    {
        $this->check($I, $data, $this->phpcs->getErrors(), 'Error');
    }

    /**
     * @param ErrorData[] $data
     */
    public function assertWarning(Assert $I, array $data): void
    {
        $this->check($I, $data, $this->phpcs->getWarnings(), 'Warning');
    }

    public function assertFixed(Assert $I, string $fixedfile): void
    {
        if ($this->phpcs->getFixableCount() > 0) {
            $I->assertTrue($this->phpcs->fixer->fixFile());
        }

        $diff = $this->phpcs->fixer->generateDiff($fixedfile);
        $I->assertSame('', $diff);
    }

    /**
     * @param ErrorData[] $expected
     * @param array<string,string>[][][] $actual
     */
    private function check(Assert $I, array $expected, array $actual, string $info): void
    {
        $count = \count($expected);
        $I->assertSame($count, \count($actual), $info . ' count. Lines: ' . \implode(', ', \array_keys($actual)));

        foreach ($expected as $item) {
            $I->assertArrayHasKey($item->line, $actual, 'lines: ' . \implode(', ', \array_keys($actual)));
            $this->checkItem($I, $item, $actual[$item->line]);
        }
    }

    /**
     * @param array<string,string>[][] $lines
     */
    private function checkItem(Assert $I, ErrorData $error, array $lines): void
    {
        $rules = [];
        foreach ($lines as $columns) {
            foreach ($columns as $item) {
                $rules[] = $item['source'];
                if ($this->checkSource($I, $error, $item) === true) {
                    return;
                }
            }
        }

        $I->fail(\sprintf(
            "Cannot find rule '%s' in line '%d'. Rules: %s",
            $error->rule,
            $error->line,
            \implode('; ', $rules)
        ));
    }

    /**
     * @param array<string,string> $item
     */
    private function checkSource(Assert $I, ErrorData $error, array $item): bool
    {
        if (empty($error->rule) === true) {
            return false;
        }

        if (\substr($item['source'], 0, \strlen($error->rule)) !== $error->rule) {
            return false;
        }

        if ($error->message !== null) {
            $I->assertStringContainsString($error->message, $item['message']);
        }

        return true;
    }
}
