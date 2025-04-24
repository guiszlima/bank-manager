<?php
require __DIR__ . '/../models/Matricula.php';

class MatriculaController
{
    // Exibe todas as matrículas
    public function index()
    {
        $matriculaModel = new Matricula();
        $courseModel = new Course();
        $matriculas = $matriculaModel->getAll();
        $nomeBusca = $_GET['busca_nome'] ?? null;
        $courses = $courseModel->getAll($nomeBusca);
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/matricula/index.php';
    }

    // Exibe o formulário para criar uma nova matrícula
    public function create()
    {
        $user = $_SESSION['user'];
        $courseModel = new Course();
        $studentModel = new Student();
        
        $courses = $courseModel->getAll();
        $students = $studentModel->getAll();
        require __DIR__ . '/../views/matricula/create.php';
    }

    // Cria uma nova matrícula
    public function store($course_id, $student_id)
    {
        $matriculaModel = new Matricula();
        $matriculaModel->create($course_id, $student_id);
        header("Location: /matricula");
        exit;
    }

    // Exibe o formulário de edição de uma matrícula
    public function edit($id)
    {
        $matriculaModel = new Matricula();
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : null;
    
        // Passa o ID do curso e o termo de pesquisa para o método que consulta as matrículas
        $matriculas = $matriculaModel->getByCourseId($id, $searchQuery);
        
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/matricula/edit.php';
    }

    // Atualiza uma matrícula
    public function update($id, $course_id, $student_id)
    {
        $matriculaModel = new Matricula();
        $matriculaModel->update($id, $course_id, $student_id);
        header("Location: /matricula");
        exit;
    }

    // Deleta uma matrícula
    public function delete($id)
    {
        
        $matriculaModel = new Matricula();
        $teste = $matriculaModel->delete($id);
        
;
        header("Location: /matricula");
        exit;
    }
}
