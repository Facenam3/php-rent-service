<?php

namespace Core;

use Core\App;

class Validator {
    public static function validate(array $data, array $rules) : array {
        $errors = [];
        foreach($rules as $field => $ruleString) {
            $rulesArray = explode('|', $ruleString);
            foreach($rulesArray as $rule) {
                if($rule === "required" && empty($data[$field])) {
                    $errors[$field] = ucfirst($field) . " is required." ;
                }

                if($rule === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = "Invalid email adress";
                }

                if(str_starts_with($rule, "min")) {
                    $minLength = explode(":", $rule)[1];
                    if(strlen($data[$field]) < $minLength) {
                        $errors[$field] = ucfirst($field) . " must be at least $minLength characters long.";
                    }
                }

                if(str_starts_with($rule, "unique")) {
                    $parts = explode(":", $rule);
                    if(isset($parts[1])) {
                        [$table, $column] = explode(",", $parts[1]);
                        $db = App::get('database');
                        $sql = "SELECT COUNT(*) FROM $table WHERE $column = :value";
                        $stmt = $db->query($sql, ['value' => $data[$field]]);
                        $count = $stmt->fetchColumn();
                        if($count > 0) {
                            $errors[$field] = ucfirst($field) . " is already taken.";
                        }
                    }
                }
            }
        }
        return $errors;
    }
}