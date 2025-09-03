<?php

namespace App\Models;

use Core\Model;
use Core\App;

class Contact extends Model{
    public static string $table = 'contact';
    public int $id;
    public string $name;
    public string $email;
    public string $message;
    public string $created_at;

    public static function getRecent(?int $limit = null, ?int $page = null, ?string $search = null) {
        /** @var \Core\Database $db */
        $db = App::get('database');

        $query = "SELECT * FROM " . static::$table;

        $params = [];

        if ($search !== null) {
            $query .= " WHERE contact.message LIKE ? OR name LIKE ?";
            $params = ["%$search%", "%$search%"];
        }

        $query .= " ORDER BY contact.created_at DESC";

        if ($limit !== null) {
            $query .= " LIMIT ?";
            $params[] = $limit;
        }

        if ($page !== null && $limit !== null) {
            $offset = ($page - 1) * $limit;
            $query .= " OFFSET ?";
            $params[] = $offset;
        }

        return $db->fetchAll($query, $params, static::class);
    }

     public static function countSearch(?string $search = null): int {
        /** @var \Core\Database $db */
        $db = App::get('database');

        $query = "
            SELECT COUNT(*) FROM " . static::$table;
        $params = [];

        if ($search !== null) {
            $query .= " WHERE contact.message LIKE ? OR contact.name LIKE ?";
            $params = ["%$search%", "%$search%"];
        }

        return (int) $db->query($query, $params)->fetchColumn();
    }

    public static function contactsThisMonth(): int {
        $db = App::get('database');

        $sql = "
            SELECT COUNT(*) as total
            FROM contact
            WHERE strftime('%Y-%m', created_at) = strftime('%Y-%m', 'now')
        ";

        $row = $db->fetch($sql);
        return (int) ($row['total'] ?? 0);
    }
}