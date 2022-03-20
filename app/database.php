<?php

/**
 * Database configuration
 */
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'mysql_host');
define('DB_PORT', '3306');
define('DB_NAME', 'example');

/**
 * PDO classes
 */
class Database {
  private $db;

  public function __construct() {
    try {
      $this->db = new PDO('mysql:host=' . DB_HOST . ';port='. DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
    }
  }

  public function query($sql, $params = array()) {
    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);
    return $stmt;
  }

  public function select($sql, $params = array()) {
    $stmt = $this->query($sql, $params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

