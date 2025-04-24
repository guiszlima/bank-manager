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
        $courses = $courseModel->getAll();
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
        $matricula = $matriculaModel->getById($id);
        $courseModel = new Course();
        $courses = $courseModel->getAll(); // Obtendo todos os cursos
        $studentModel = new Student();
        $students = $studentModel->getAll(); // Obtendo todos os estudantes
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/matricula/edit.php';
    }

    // Atualiza uma matrícula
    public function update($id, $course_id, $student_id)
    {
        $matriculaModel = new Matricula();
        $matriculaModel->update($id, $course_id, $student_id);
        header("Location: /matriculas");
        exit;
    }

    // Deleta uma matrícula
    public function delete($id)
    {
        $matriculaModel = new Matricula();
        $matriculaModel->delete($id);
        header("Location: /matriculas");
        exit;
    }
}
