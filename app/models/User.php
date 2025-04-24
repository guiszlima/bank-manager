<?php

class User
{
    private PDO $pdo;

    // Construtor que instancia o PDO
    public function __construct()
    {
        
        $this->pdo = new PDO('mysql:host=db;dbname=app_db', 'user', 'secret');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Método de instância para obter todos os usuários
    public function all(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método de instância para buscar um usuário por ID
    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
    // Método de instância para criar um novo usuário
    public function create(string $name, string $email, string $password): bool
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hash]);
    }
}
