<?php

$db = new PDO('sqlite:database.sqlite');
$db->exec('DROP TABLE IF EXISTS users');
$db->exec('CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT UNIQUE,
  password TEXT
)');
$db->exec('INSERT INTO users (name, password) VALUES ('. implode(',', [
    $db->quote('Admin'.bin2hex(openssl_random_pseudo_bytes(2))),
    $db->quote(bin2hex(openssl_random_pseudo_bytes(20)))
]).')');
$db->exec('INSERT INTO users (name, password) VALUES ('. implode(',', [
    $db->quote('User1'),
    $db->quote(bin2hex(openssl_random_pseudo_bytes(20)))
]).')');
