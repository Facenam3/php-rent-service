<?php
require_once __DIR__ . "/../bootstrap.php";
use Core\App;

$db = App::get('database');


$schemaFILE = __DIR__ . "/../database/schema.sql";
$sql = file_get_contents($schemaFILE);
$parts = array_filter(explode(separator: ";", string: $sql));
foreach($parts as $sqlPart) {
    $db->query($sqlPart);
}
echo "Schema loaded successfully.";

echo "Error loading schema: " . $e->getMessage() . "/n";
