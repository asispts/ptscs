<?php

// Squiz.Arrays.ArrayBracketSpacing
$array      ['key'] = 'value';

$array[     'key'] = 'value';

$array['key'       ] = 'value';


// Generic.Arrays.ArrayIndent
$myArray =    [
            'key1'      =>          'value',
            'key2'          =>  'value',
            'key3'      =>      'value'
            ];

function dataProvider(): array
{
    return [
                                    'Strict types test' => [
                                                            'no-directive.php.inc',
                                                            1,
                                                            0,
                                                        ],
                                ];
}
