<?php

// Squiz.Arrays.ArrayBracketSpacing
$array      ['key'] = 'value';

$array[     'key'] = 'value';

$array['key'       ] = 'value';


// Generic.Arrays.ArrayIndent
$myArray =          [
            'key1'      =>          'value',
            'key-long-long-long'          =>  'value',
            'key-medium'      =>      'value'
            ];

function dataProvider(): array
{
    return [
                                    'Strict types test'             => [
                                                            'no-directive.php.inc',
                                                            1,
                                                            0,
                                                        ],
                                ];
}


function check(): void
{
                return $myArray ===          [
                    'key1'      =>          'value',
                                'key-long-long-long'          =>  'value',
'key-medium'      =>      'value'
                    ];
}
