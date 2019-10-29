<?php

class DB {
  private $dbHost = "localhost";
  private $dbUser = "admin";
  private $dbPassword = "Op3c4rdb_";
  private $dbName = "namesdb";
  private $conn;

  public function __construct() {
    try {
      $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
      $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die("DB Connection failed: " . $e->getMessage());
    }
  }

  public function insertData($name) {
    $sql = "INSERT INTO names (name) VALUES (:name)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['name' => $name]);
    echo "data inserted";
  }

  public function getData() {
    $sql = "SELECT * FROM names";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  public function deleteData($id) {
    $sql = "DELETE FROM names WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
  }

  public function editData($id, $name) {
    $sql = "UPDATE names SET name = :name WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name]);
  }

  public function searchData($name) {
    $sql = "SELECT * FROM names WHERE name LIKE :name";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['name' => '%' . $name . '%']);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
}