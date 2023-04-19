<?php declare(strict_types=1);

namespace Ptscs\Tests\Standard;

use Iterator;
use PHPUnit\Framework\TestCase;
use Ptscs\Tests\Utils\ErrorData;
use Ptscs\Tests\Utils\SniffAssertion;

final class DefaultPsr12StandardTest extends TestCase
{
    /**
     * @var string[]
     */
    private $excludes = [
      'PSR1.Classes.ClassDeclaration.MissingNamespace',
      'PSR1.Files.SideEffects.FoundWithSymbols',
    ];

    /**
     * @dataProvider provideTestData
     */
    public function test_fixed_files_should_not_produce_errors(string $filename): void
    {
        $fixedfile = __DIR__ . '/_data/' . $filename . '.php.fixed';

        $sniff = new SniffAssertion($fixedfile, 'PSR12', $this->excludes);
        $sniff->assertError($this, []);
        $sniff->assertWarning($this, []);
    }

    /**
     * @dataProvider provideTestData
     *
     * @param ErrorData[] $errorData
     * @param ErrorData[] $warningData
     */
    public function test_sniff(string $filename, array $errorData = [], array $warningData = []): void
    {
        $incfile   = __DIR__ . '/_data/' . $filename . '.php.inc';
        $fixedfile = __DIR__ . '/_data/' . $filename . '.php.fixed';

        $sniff = new SniffAssertion($incfile, 'PSR12', $this->excludes);
        $sniff->assertError($this, $errorData);
        $sniff->assertWarning($this, $warningData);
        $sniff->assertFixed($this, $fixedfile);
    }

    public static function provideTestData(): Iterator
    {
        yield 'ScopeIndent data' => [
          'ScopeIndent',
          [
            new ErrorData(5, 'Generic.WhiteSpace.ScopeIndent.Incorrect'),
            new ErrorData(13, 'Generic.WhiteSpace.ScopeIndent.IncorrectExact'),
            new ErrorData(15, 'Generic.WhiteSpace.ScopeIndent.IncorrectExact'),
            new ErrorData(16, 'Generic.WhiteSpace.ScopeIndent.Incorrect'),
            new ErrorData(17, 'Generic.WhiteSpace.ScopeIndent.IncorrectExact'),
            new ErrorData(20, 'Squiz.Functions.MultiLineFunctionDeclaration.BraceIndent'),
          ],
        ];

        yield 'OperatorSpacing data' => [
          'OperatorSpacing',
          [
            new ErrorData(3, 'PSR12.Operators.OperatorSpacing.NoSpaceBefore'),
            new ErrorData(4, 'PSR12.Operators.OperatorSpacing.NoSpaceAfter'),
          ],
        ];

        yield 'class data' => [
          'class',
          [
            new ErrorData(1, 'PSR12.Files.FileHeader.SpacingAfterBlock'),
            new ErrorData(2, 'PSR12.Files.FileHeader.SpacingAfterBlock'),
            new ErrorData(3, 'Generic.Formatting.DisallowMultipleStatements.SameLine'),
            new ErrorData(4, 'PSR12.Files.FileHeader.SpacingAfterBlock'),
            new ErrorData(6, 'PSR2.Classes.ClassDeclaration.ExtendsLine'),
            new ErrorData(7, 'PSR2.Classes.ClassDeclaration.ImplementsLine'),
            new ErrorData(9, 'PSR12.Traits.UseDeclaration.NoBlankLineAfterUse'),
            new ErrorData(15, 'PSR2.Methods.FunctionClosingBrace.SpacingBeforeClose'),
            new ErrorData(17, 'Squiz.WhiteSpace.ScopeClosingBrace.ContentBefore'),
            new ErrorData(22, 'Squiz.Functions.MultiLineFunctionDeclaration.BraceOnSameLine'),
            new ErrorData(27, 'PSR2.Classes.ClassDeclaration.CloseBraceAfterBody'),
          ],
        ];

        yield 'FunctionCallSignature data' => [
          'FunctionCallSignature',
          [
            new ErrorData(3, 'PSR2.Methods.FunctionCallSignature.SpaceAfterOpenBracket'),
            new ErrorData(4, 'PSR2.Methods.FunctionCallSignature.SpaceBeforeCloseBracket'),
            new ErrorData(5, 'PSR2.Methods.FunctionCallSignature.SpaceBeforeOpenBracket'),
            new ErrorData(6, 'PSR2.Methods.FunctionCallSignature.CloseBracketLine'),
            new ErrorData(7, 'PSR2.Methods.FunctionCallSignature.ContentAfterOpenBracket'),
            new ErrorData(8, 'PSR2.Methods.FunctionCallSignature.Indent'),
          ],
        ];

        yield 'function data' => [
          'function',
          [
            new ErrorData(3, 'Squiz.Functions.MultiLineFunctionDeclaration.SpaceAfterFunction'),
            new ErrorData(6, 'Squiz.Functions.MultiLineFunctionDeclaration.SpaceBeforeOpenParen'),
            new ErrorData(9, 'Squiz.Functions.FunctionDeclarationArgumentSpacing.SpacingBetween'),
            new ErrorData(12, 'Squiz.Functions.FunctionDeclarationArgumentSpacing.SpacingAfterHint'),
            new ErrorData(15, 'Squiz.Functions.FunctionDeclarationArgumentSpacing.SpacingAfterOpen'),
            new ErrorData(18, 'Squiz.Functions.FunctionDeclarationArgumentSpacing.SpacingBeforeClose'),

            new ErrorData(21, 'Squiz.Functions.MultiLineFunctionDeclaration.FirstParamSpacing'),
            new ErrorData(22, 'Squiz.Functions.MultiLineFunctionDeclaration.Indent'),
            new ErrorData(23, 'Squiz.Functions.MultiLineFunctionDeclaration.CloseBracketLine'),
            new ErrorData(24, 'Squiz.Functions.MultiLineFunctionDeclaration.NewlineBeforeOpenBrace'),
          ],
        ];


        yield 'cast data' => [
          'cast',
          [
            new ErrorData(3, 'Squiz.WhiteSpace.CastSpacing.ContainsWhiteSpace'),
            new ErrorData(4, 'Squiz.WhiteSpace.CastSpacing.ContainsWhiteSpace'),
          ],
        ];

        yield 'concatenation data' => [
          'concatenation',
          [
            new ErrorData(3, 'PSR12.Operators.OperatorSpacing.NoSpaceBefore'),
          ],
        ];

        yield 'object data' => [
          'object',
          [],
        ];

        yield 'ControlStructure data' => [
          'ControlStructure',
          [
            new ErrorData(3, 'PSR12.ControlStructures.ControlStructureSpacing.FirstExpressionLine'),
            new ErrorData(4, 'PSR12.ControlStructures.ControlStructureSpacing.LineIndent'),
            new ErrorData(5, 'PSR12.ControlStructures.ControlStructureSpacing.CloseParenthesisLine'),
          ],
        ];

        yield 'array data' => [
          'array',
          [],
        ];
        yield 'language data' => [
          'language',
          [],
        ];
    }
}
