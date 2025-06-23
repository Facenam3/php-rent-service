<?php
require_once __DIR__ . "/../bootstrap.php";
use Core\App;

$db = App::get('database');


$schemaFile = __DIR__ . "/../database/schema_fix.sql";

if (!file_exists($schemaFile)) {
    exit("Schema file not found at: $schemaFile" . PHP_EOL);
}
$sql = file_get_contents($schemaFile);
$parts = array_filter(explode(separator:";", string:$sql));
echo "Executing SQL statements..." . PHP_EOL;
foreach ($parts as $sqlPart) {
    $sqlPart = trim($sqlPart);
    if (!empty($sqlPart)) {
        $success = $db->query($sqlPart);
        if (!$success) {
            echo "Failed to run: $sqlPart" . PHP_EOL;
        }
      
    }
}
  echo "Schema loaded successfully." . PHP_EOL;