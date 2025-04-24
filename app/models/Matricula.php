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
        // Verificar se o aluno já está matriculado neste curso
        $stmt = $this->pdo->prepare("
            SELECT COUNT(*) FROM matriculas 
            WHERE student_id = ? AND course_id = ?
        ");
        $stmt->execute([$student_id, $course_id]);  // Corrigido: usar $student_id e $course_id
        
        $count = $stmt->fetchColumn();
        
        if ($count > 0) {
            // Se o aluno já estiver matriculado no curso, você pode tratar o erro
            
            return;
        }
        
        // Caso contrário, faça a matrícula
        $stmt = $this->pdo->prepare("
            INSERT INTO matriculas (student_id, course_id, data_matricula)
            VALUES (?, ?, NOW())
        ");
        $stmt->execute([$course_id,$student_id]);  // Corrigido: usar $student_id e $course_id
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

  public function getByCourseId($courseId, $searchQuery = null)
{
    // Monta a consulta SQL
    $sql = "
        SELECT matriculas.id AS matricula_id, students.nome AS student_name, students.email AS student_email, students.id AS student_id
        FROM matriculas
        JOIN students ON matriculas.student_id = students.id
        WHERE matriculas.course_id = :courseId
    ";

    // Se houver um termo de pesquisa, adiciona ao filtro SQL
    if ($searchQuery) {
        $sql .= " AND (students.nome LIKE :searchQuery OR students.email LIKE :searchQuery)";
    }

    // Prepara a consulta
    $stmt = $this->pdo->prepare($sql);
    
    // Vincula o parâmetro courseId
    $stmt->bindValue(':courseId', $courseId, PDO::PARAM_INT);

    // Se houver pesquisa, vincula o parâmetro searchQuery
    if ($searchQuery) {
        $stmt->bindValue(':searchQuery', "%{$searchQuery}%", PDO::PARAM_STR);
    }

    // Executa a consulta
    $stmt->execute();
    
    // Retorna os resultados
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
