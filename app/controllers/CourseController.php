<?php
require __DIR__ . '/../models/Course.php';

class CourseController
{
    public function index()
    {
        $courseModel = new Course();
        $courses = $courseModel->getAll();
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/course/index.php';
    }

    public function create()
    {
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/course/create.php';
    }

    public function store($nome, $descricao)
    {
        $courseModel = new Course();
        $courseModel->create($nome, $descricao);
        header("Location: /cursos");
        exit;
    }

    public function edit($id)
    {
        $courseModel = new Course();
        $curso = $courseModel->getById($id);
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/course/edit.php';
    }

    public function update($id, $nome, $descricao)
    {
        $courseModel = new Course();
        $courseModel->update($id, $nome, $descricao);
        header("Location: /cursos");
        exit;
    }

    public function delete($id)
    {
        $courseModel = new Course();
        $courseModel->delete($id);
        header("Location: /cursos");
        exit;
    }
}
