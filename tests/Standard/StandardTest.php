<?php declare(strict_types=1);

namespace Ptscs\Tests\Standard;

use Iterator;
use PHPUnit\Framework\TestCase;
use Ptscs\Tests\Utils\SniffAssertion;

final class StandardTest extends TestCase
{
    /**
     * @var string[]
     */
    private $excludes = [
      'PSR1.Classes.ClassDeclaration.MissingNamespace',
      'PSR1.Files.SideEffects.FoundWithSymbols',
      'SlevomatCodingStandard.TypeHints.DeclareStrictTypes',
      'SlevomatCodingStandard.Classes.RequireAbstractOrFinal',
      'SlevomatCodingStandard.Namespaces.UnusedUses',
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

    public static function provideFileOnly(): Iterator
    {
        $dir = __DIR__ . '/_data';

        yield 'ControlStructure' => [$dir . '/ControlStructure.php.fixed'];
        yield 'FunctionCallSignature' => [$dir . '/FunctionCallSignature.php.fixed'];
    }

    /**
     * @dataProvider psr12FixedFiles
     */
    public function test_fix_psr12(string $filepath): void
    {
        $fixedfile = \str_replace('_data', '_fixed', $filepath);

        $sniff = new SniffAssertion($filepath, 'ptscs', $this->excludes);
        $sniff->assertFixed($this, $fixedfile);
    }

    public static function psr12FixedFiles(): Iterator
    {
        $dir = __DIR__ . '/_data';

        yield 'array' => [$dir . '/array.php.fixed'];
        yield 'cast' => [$dir . '/cast.php.fixed'];
        yield 'class' => [$dir . '/class.php.fixed'];
        yield 'concatenation' => [$dir . '/concatenation.php.fixed'];
        yield 'function' => [$dir . '/function.php.fixed'];
        yield 'language' => [$dir . '/language.php.fixed'];
        yield 'object' => [$dir . '/object.php.fixed'];
        yield 'OperatorSpacing' => [$dir . '/OperatorSpacing.php.fixed'];
        yield 'ScopeIndent' => [$dir . '/ScopeIndent.php.fixed'];
    }
}
