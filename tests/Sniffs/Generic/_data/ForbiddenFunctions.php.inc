<?php

sizeof([]);
print($var);
each([]);
is_null($var);
$newfunc = create_function('$a,$b', 'return "ln($a) + ln($b) = " . log($a * $b);');
var_dump($var);
print_r($var);
debug_print_backtrace();
eval($var);
extract($var);
