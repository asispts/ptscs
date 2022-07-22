<?php

// Squiz.Strings.ConcatenationSpacing
$var = 'Hello' .     ' World';
$var = 'Hello'      . ' World';

$var = 'Hello'      .
' World';

$var = 'Hello'
.   ' World';

$var = 'Hello'
.
' World';


// Squiz.Strings.EchoedStrings
echo('Should not be bracketed');


// Squiz.Strings.DoubleQuoteUsage
echo "Double quote is not required here";

echo "Hello $var";
