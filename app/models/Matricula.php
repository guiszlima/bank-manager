<?php

class Matricula
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=db;dbname=app_db', 'user', 'secret');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Método para obter todas as matrículas
    public function getAll()
    {
        // Obtendo todas as matrículas com informações do curso e do aluno
        $stmt = $this->pdo->query("
            SELECT matriculas.id, matriculas.data_matricula, students.nome AS student_name, courses.title AS course_title
            FROM matriculas
            JOIN students ON matriculas.student_id = students.id
            JOIN courses ON matriculas.course_id = courses.id
        ");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Método para criar uma nova matrícula
    public function create($course_id, $student_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO matriculas (course_id, student_id) VALUES (?, ?)");
        return $stmt->execute([$course_id, $student_id]);
    }

    // Método para obter uma matrícula pelo ID
    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM matriculas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para obter todas as matrículas de um curso
  // Matricula.php

public function getByCourseId($courseId)
{
    $stmt = $this->pdo->prepare("
        SELECT students.name AS student_name, students.id AS student_id
        FROM matriculas
        JOIN students ON matriculas.student_id = students.id
        WHERE matriculas.course_id = ?
    ");
    $stmt->execute([$courseId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    // Método para obter todas as matrículas de um estudante
    public function getByStudentId($student_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM matriculas WHERE student_id = ?");
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para atualizar uma matrícula
    public function update($id, $course_id, $student_id)
    {
        $stmt = $this->pdo->prepare("UPDATE matriculas SET course_id = ?, student_id = ? WHERE id = ?");
        return $stmt->execute([$course_id, $student_id, $id]);
    }

    // Método para deletar uma matrícula
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM matriculas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
