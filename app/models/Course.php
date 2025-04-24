<?php
class Course
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=db;dbname=app_db', 'user', 'secret');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll($titulo = null)
{
    if ($titulo) {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE title LIKE ?");
        $stmt->execute(["%{$titulo}%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $this->pdo->query("SELECT * FROM courses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


    public function create($nome, $descricao)
    {
        $stmt = $this->pdo->prepare("INSERT INTO courses (title, descricao) VALUES (?, ?)");
        return $stmt->execute([$nome, $descricao]);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $descricao)
    {
        $stmt = $this->pdo->prepare("UPDATE courses SET title = ?, descricao = ? WHERE id = ?");
        return $stmt->execute([$nome, $descricao, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
