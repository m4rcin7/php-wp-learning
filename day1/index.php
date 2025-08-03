<?php
// Day 1: Basic rules and variables - Enhanced version
// PHP Learning Challenge - 7 days to MID level

echo "<h1>DAILY PHP-WORDPRESS-LEARNING</h1>";

// ===========================================
// BASIC PHP SYNTAX & RULES
// ===========================================

// 1. PHP always starts with <?php
// 2. Statements end with semicolon ;
// 3. Variables start with $ sign
// 4. Case-sensitive for variables, case-insensitive for functions/keywords

echo "<h2>1. SCALAR TYPES (Single values)</h2>";

// Integers
$integer = 42;
$negativeInt = -15;
$hexInt = 0xFF; // 255 in decimal
$binaryInt = 0b1010; // 10 in decimal

echo "Integer: $integer<br>";
echo "Negative: $negativeInt<br>";
echo "Hex: $hexInt<br>";
echo "Binary: $binaryInt<br><br>";

// Floats (Double precision)
$float = 3.14;
$scientificFloat = 1.2e3; // 1200
$negativeFloat = -2.5;

echo "Float: $float<br>";
echo "Scientific: $scientificFloat<br>";
echo "Negative float: $negativeFloat<br><br>";

// Strings - Different ways to create
$singleQuote = 'Single quote string';
$doubleQuote = "Double quote with $integer interpolation";
$heredoc = <<<EOT
This is heredoc syntax
Multi-line string with $integer interpolation
EOT;

$nowdoc = <<<'EOT'
This is nowdoc syntax
No $integer interpolation here
EOT;

echo "Single quote: $singleQuote<br>";
echo "Double quote: $doubleQuote<br>";
echo "Heredoc: " . nl2br($heredoc) . "<br>";
echo "Nowdoc: " . nl2br($nowdoc) . "<br><br>";

// Booleans
$trueValue = true;
$falseValue = false;
$boolFromInt = (bool)1; // true
$boolFromString = (bool)"hello"; // true
$boolFromEmpty = (bool)""; // false

echo "True: " . ($trueValue ? 'TRUE' : 'FALSE') . "<br>";
echo "False: " . ($falseValue ? 'TRUE' : 'FALSE') . "<br>";
echo "Bool from 1: " . ($boolFromInt ? 'TRUE' : 'FALSE') . "<br>";
echo "Bool from string: " . ($boolFromString ? 'TRUE' : 'FALSE') . "<br>";
echo "Bool from empty: " . ($boolFromEmpty ? 'TRUE' : 'FALSE') . "<br><br>";

echo "<h2>2. COMPOUND TYPES (Multiple values)</h2>";

// Arrays - Multiple syntaxes
$indexedArray = [1, 2, 3, 4]; // Modern syntax
$oldArray = array(5, 6, 7, 8); // Old syntax (still valid)
$associativeArray = [
    'name' => 'John',
    'age' => 30,
    'city' => 'Warsaw'
];

$mixedArray = [
    'string',
    42,
    true,
    ['nested', 'array'],
    'key' => 'value'
];

echo "Indexed array: " . implode(', ', $indexedArray) . "<br>";
echo "Associative array name: " . $associativeArray['name'] . "<br>";
echo "Mixed array first element: " . $mixedArray[0] . "<br>";
echo "Mixed array by key: " . $mixedArray['key'] . "<br><br>";

// Objects - Basic class
class SimpleClass {
    public $property = 'I am a property';
    
    public function method() {
        return 'I am a method';
    }
}

$object = new SimpleClass();
$stdObject = new stdClass();
$stdObject->dynamicProperty = 'Dynamic property';

echo "Object property: " . $object->property . "<br>";
echo "Object method: " . $object->method() . "<br>";
echo "stdClass property: " . $stdObject->dynamicProperty . "<br><br>";

// Callables
$anonymousFunction = function($name) {
    return "Hello, $name!";
};

function namedFunction($text) {
    return "Named function says: $text";
}

$callableArray = ['SimpleClass', 'method']; // Static method call format

echo "Anonymous function: " . $anonymousFunction('Developer') . "<br>";
echo "Named function: " . namedFunction('World') . "<br><br>";

echo "<h2>3. SPECIAL TYPES</h2>";

// NULL
$nullValue = null;
$unsetVariable;
unset($integer); // $integer is now null

echo "Null value: " . ($nullValue === null ? 'NULL' : 'NOT NULL') . "<br>";
echo "Unset variable: " . (isset($unsetVariable) ? 'SET' : 'NOT SET') . "<br><br>";

// Resources (handle external resources)
if (file_exists('temp.txt') || file_put_contents('temp.txt', 'Temporary content')) {
    $fileResource = fopen('temp.txt', 'r');
    echo "File resource type: " . gettype($fileResource) . "<br>";
    fclose($fileResource);
    unlink('temp.txt'); // Clean up
}

echo "<h2>4. TYPE CHECKING & CONVERSION</h2>";

// Type checking functions
$testVar = "123";
echo "Variable '$testVar' is:<br>";
echo "- String: " . (is_string($testVar) ? 'YES' : 'NO') . "<br>";
echo "- Integer: " . (is_int($testVar) ? 'YES' : 'NO') . "<br>";
echo "- Numeric: " . (is_numeric($testVar) ? 'YES' : 'NO') . "<br>";
echo "Type: " . gettype($testVar) . "<br><br>";

// Type conversion (casting)
$stringNumber = "42";
$intFromString = (int)$stringNumber;
$floatFromString = (float)$stringNumber;
$boolFromString = (bool)$stringNumber;

echo "Original: '$stringNumber' (type: " . gettype($stringNumber) . ")<br>";
echo "To int: $intFromString (type: " . gettype($intFromString) . ")<br>";
echo "To float: $floatFromString (type: " . gettype($floatFromString) . ")<br>";
echo "To bool: " . ($boolFromString ? 'TRUE' : 'FALSE') . " (type: " . gettype($boolFromString) . ")<br><br>";

echo "<h2>5. VARIABLE SCOPE & SUPERGLOBALS</h2>";

// Global scope
$globalVar = "I'm global";

function testScope() {
    global $globalVar;
    $localVar = "I'm local";
    echo "Inside function - Global: $globalVar<br>";
    echo "Inside function - Local: $localVar<br>";
}

testScope();
echo "Outside function - Global: $globalVar<br>";
// echo "Outside function - Local: $localVar<br>"; // This would cause error

echo "<br>Superglobals available:<br>";
echo "- \$_GET: " . (empty($_GET) ? 'empty' : 'has data') . "<br>";
echo "- \$_POST: " . (empty($_POST) ? 'empty' : 'has data') . "<br>";
echo "- \$_SERVER['PHP_SELF']: " . $_SERVER['PHP_SELF'] . "<br>";
echo "- \$_SERVER['SERVER_NAME']: " . $_SERVER['SERVER_NAME'] . "<br>";

echo "<h2>6. CONSTANTS</h2>";

// Constants - cannot be changed
define('SITE_NAME', 'My PHP Learning Site');
const VERSION = '1.0.0'; // Alternative syntax (PHP 5.3+)

echo "Site name: " . SITE_NAME . "<br>";
echo "Version: " . VERSION . "<br>";

// Magic constants
echo "Current file: " . __FILE__ . "<br>";
echo "Current line: " . __LINE__ . "<br>";
echo "Current function: " . __FUNCTION__ . "<br>";

?>