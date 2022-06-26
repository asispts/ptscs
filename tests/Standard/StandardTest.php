<?php declare(strict_types=1);

namespace Ptscs\Tests\Standard;

use Iterator;
use PHPUnit\Framework\TestCase;
use Ptscs\Tests\Utils\SniffAssertion;

final class StandardTest extends TestCase
{
    /**
     * @dataProvider provideFileOnly
     */
    public function test_should_not_produce_errors(string $filepath): void
    {
        $excludes = ['PSR1.Classes.ClassDeclaration.MissingNamespace',
        'PSR1.Files.SideEffects.FoundWithSymbols', 'Generic.PHP.RequireStrictTypes'];
        $sniff = new SniffAssertion($filepath, 'ptscs', $excludes);
        $sniff->assertError($this, []);
        $sniff->assertWarning($this, []);
    }

    public function provideFileOnly(): Iterator
    {
        $dir = __DIR__ . '/_data';

        yield 'array' => [$dir . '/array.php.fixed'];
        yield 'cast' => [$dir . '/cast.php.fixed'];
        yield 'class' => [$dir . '/class.php.fixed'];
        yield 'concatenation' => [$dir . '/concatenation.php.fixed'];
        yield 'ControlStructure' => [$dir . '/ControlStructure.php.fixed'];
        yield 'function' => [$dir . '/function.php.fixed'];
        yield 'FunctionCallSignature' => [$dir . '/FunctionCallSignature.php.fixed'];
        yield 'language' => [$dir . '/language.php.fixed'];
        yield 'object' => [$dir . '/object.php.fixed'];
        yield 'OperatorSpacing' => [$dir . '/OperatorSpacing.php.fixed'];
        yield 'ScopeIndent' => [$dir . '/ScopeIndent.php.fixed'];
    }
}
