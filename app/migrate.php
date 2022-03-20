<?php
require_once './database.php';

$db = new Database();

$query = [
  "schedules" => "CREATE TABLE schedules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )",
];

/**
 * Migrate the database
 */
foreach ($query as $key => $value) {
  if ($db->query($value))
  {
    echo "Table $key created successfully\n";
  }
  else
  {
    echo "Error creating table $key\n";
  }
}