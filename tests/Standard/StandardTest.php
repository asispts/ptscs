<?php declare(strict_types=1);

namespace Ptscs\Tests\Standard;

use Iterator;
use PHPUnit\Framework\TestCase;
use Ptscs\Tests\Utils\SniffAssertion;

final class StandardTest extends TestCase
{
    private $excludes = [
      'PSR1.Classes.ClassDeclaration.MissingNamespace',
      'PSR1.Files.SideEffects.FoundWithSymbols',
      'Generic.PHP.RequireStrictTypes',
    ];

    /**
     * @dataProvider provideFileOnly
     */
    public function test_should_not_produce_errors(string $filepath): void
    {
        $sniff = new SniffAssertion($filepath, 'ptscs', $this->excludes);
        $sniff->assertError($this, []);
        $sniff->assertWarning($this, []);
    }

    public function provideFileOnly(): Iterator
    {
        $dir = __DIR__ . '/_data';

        yield 'cast' => [$dir . '/cast.php.fixed'];
        yield 'class' => [$dir . '/class.php.fixed'];
        yield 'concatenation' => [$dir . '/concatenation.php.fixed'];
        yield 'ControlStructure' => [$dir . '/ControlStructure.php.fixed'];
        yield 'function' => [$dir . '/function.php.fixed'];
        yield 'FunctionCallSignature' => [$dir . '/FunctionCallSignature.php.fixed'];
        yield 'object' => [$dir . '/object.php.fixed'];
    }

    /**
     * @dataProvider psr12FixedFiles
     */
    public function test_fix_psr12(string $filepath): void
    {
        $fixedfile = str_replace('_data', '_fixed', $filepath);

        $sniff = new SniffAssertion($filepath, 'ptscs', $this->excludes);
        $sniff->assertFixed($this, $fixedfile);
    }

    public function psr12FixedFiles(): Iterator
    {
        $dir = __DIR__ . '/_data';

        yield 'array' => [$dir . '/array.php.fixed'];
        yield 'language' => [$dir . '/language.php.fixed'];
    }
}
