<?php

namespace app\models;

class People extends Connection
{
    public function create()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $conn = $this->connect();
        $sql = "INSERT INTO peoples (nome, email) VALUES (:nome, :email)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        return $stmt;
    }

    public function findAll()
    {
        $conn = $this->connect();
        $sql = "select * from peoples";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    public function findById($id)
    {
        $conn = $this->connect();
        $sql = "select * from peoples where id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
        
    }

    public function destroy($id)
    {
        $conn = $this->connect();
        $sql = "delete from peoples where id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }

    public function update($id, $nome, $email)
    {
        $conn = $this->connect();
        $sql = "UPDATE peoples SET nome = :nome, email = :email WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        return $stmt;
    }

    public function search($search)
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM peoples WHERE nome LIKE :search OR email LIKE :search";
        $stmt = $conn->prepare($sql);
        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }
}
