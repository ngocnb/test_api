<?php
class User {

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $email;
    public $name;
    public $address;
    public $tel;
    public $created;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function find($id) {
        $query = "SELECT * from {$this->table_name} where id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $id = htmlspecialchars(strip_tags($id));

        // bind value
        $stmt->bindParam(':id', $id);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getUserById($id) {
        // query users
        $stmt = $this->find($id);
        $num = $stmt->rowCount();

        if ($num == 0) {
            return false;
        }

        // retrieve our user
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // extract row
            extract($row);

            $user = array(
                "id" => $id,
                "email" => $email,
                "name" => $name,
                "address" => $address,
                "tel" => $tel
            );
        }

        return $user;
    }

    public function update($data) {
        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                address = :address,
                tel = :tel,
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $data->name = htmlspecialchars(strip_tags($data->name));
        $data->address = htmlspecialchars(strip_tags($data->address));
        $data->tel = htmlspecialchars(strip_tags($data->tel));
        $data->id = htmlspecialchars(strip_tags($data->id));

        // bind new values
        $stmt->bindParam(':name', $data->name);
        $stmt->bindParam(':address', $data->address);
        $stmt->bindParam(':tel', $data->tel);
        $stmt->bindParam(':id', $data->id);

        // execute the query
        $result = $stmt->execute();

        if ($result) {
            return true;
        }

        return false;
    }
}