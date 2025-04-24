<?php
require __DIR__ . '/../models/Student.php';
class StudentController{




    public function index()
    {
        $studentModel = new Student();
        $students = $studentModel->getAll();
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/student/index.php';
    }
    public function create()
    {
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/student/create.php';
    }
    public function store($nome,$email,$data_nascimento)
    {
        $studentModel = new Student();
        $studentModel->create($nome, $email, $data_nascimento);
        
        header("Location: /estudante");
        exit;

    }

    public function edit($id)
    {
        $studentModel = new Student();
        $student = $studentModel->getById($id);
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/student/edit.php';
    }
    
    public function update($id, $nome, $email, $data_nascimento)
    {
        $studentModel = new Student();
        $studentModel->update($id, $nome, $email, $data_nascimento);
        header('Location: /estudante');
        exit;
    }
    

    public function delete($id)
{
    $studentModel = new Student();
    $studentModel->delete($id);
    header('Location: /estudante');
    exit;
}
}