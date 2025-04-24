<?php

class Student
{
    protected $pdo;

    // Construtor para conectar ao banco de dados
    public function __construct()
    {
         
        $this->pdo = new PDO('mysql:host=db;dbname=app_db', 'user', 'secret');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Método para criar um novo aluno
    public function create($nome, $email, $data_nascimento)
    {
        $sql = "INSERT INTO students (nome, email, data_nascimento) VALUES (:nome, :email, :data_nascimento)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':data_nascimento', $data_nascimento);

        return $stmt->execute();
    }

    // Método para obter todos os alunos
    public function getAll()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obter um aluno por ID
    public function getById($id)
    {
        $sql = "SELECT * FROM students WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar as informações de um aluno
    public function update($id, $nome, $email, $data_nascimento)
    {
        $sql = "UPDATE students SET nome = :nome, email = :email, data_nascimento = :data_nascimento WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':data_nascimento', $data_nascimento);

        return $stmt->execute();
    }

    // Método para excluir um aluno
    public function delete($id)
    {
        $sql = "DELETE FROM students WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
