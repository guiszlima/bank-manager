<?php

require 'controllers/AuthController.php';
require 'controllers/DashBoardController.php';
require 'controllers/StudentController.php';
require 'controllers/CourseController.php';
require 'controllers/MatriculaController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$controller = null;

if (isset($_SESSION['user'])) {
    

    if ($uri === '/dashboard') {
        $controller = new DashBoardController();
        $controller->index();
        exit;
    }
    if ($uri === '/estudante') {
        $controller = new StudentController();
        $controller->index();
        exit;
    } 
    if ($uri === '/criar-estudante') {
        $controller = new StudentController();
        $controller->create();
        exit;
    }
    if ($uri === '/criar-estudante/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $controller = new StudentController();
        $controller->store($name, $email, $birthday);
        exit;
    }
    if (preg_match('#^/estudante/edit/(\d+)$#', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new StudentController();

        $controller->edit($matches[1]);
        exit;
    }
    if ($uri === '/student/update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new StudentController();
        $controller->update($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['data_nascimento']);
        exit;
    }
    if (preg_match('#^/student/delete/(\d+)$#', $uri, $matches)) {
        $controller = new StudentController();
        $controller->delete($matches[1]);
        exit;
    }

    if ($uri === '/cursos') {
        $controller = new CourseController();
        $controller->index();
        exit;
    }
    
    if ($uri === '/criar-curso') {
        $controller = new CourseController();
        
        $controller->create();
        exit;
    }
    
    if ($uri === '/curso/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new CourseController();
        $controller->store($_POST['nome'], $_POST['descricao']);
        exit;
    }
    
    if (preg_match('#^/curso/edit/(\d+)$#', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new CourseController();
        $controller->edit($matches[1]); // $matches[1] é o ID do curso
        exit;
    }
    
    // Rota POST para atualizar o curso
    if ($uri === '/cursos/update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new CourseController();
        $controller->update($_POST['id'], $_POST['nome'], $_POST['descricao']);
        exit;
    }
    
    // Rota GET para deletar curso
    if (preg_match('#^/curso/delete/(\d+)$#', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new CourseController();
        $controller->delete($matches[1]);
        exit;
    }



    if($uri === '/matricula') {
        $controller = new MatriculaController();
        $controller->index();
        exit;
    }
    if ($uri === '/matricula/criar') {
        $controller = new MatriculaController();
        $controller->create();
        exit;
    }
    if ($uri === '/matricula/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $controller = new MatriculaController();
        $controller->store($student_id, $course_id);
        exit;
    }

    if (preg_match('#^/matricula/ver/(\d+)$#', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        // O ID da matrícula é capturado via expressões regulares
        $id = $matches[1];
        
        // Instancia o controlador e chama o método edit com o ID da matrícula
        $controller = new MatriculaController();
        $controller->edit($id);  // O $id é passado para o método edit do controlador
        exit;
    }
    if (preg_match('#^/matricula/delete/(\d+)$#', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        // O ID da matrícula é capturado via expressões regulares
        $id = $matches[1];
        
        // Instancia o controlador e chama o método edit com o ID da matrícula
        $controller = new MatriculaController();
        $controller->delete($id);  
        exit;
    }
    
    if ($uri === '/logout') {
        
        $controller = new AuthController();
        $controller->logout();
        exit;
    }





} else {
    

    if ($uri === '/') {
        $controller = new AuthController();
        $controller->index(); 
        exit;
    }

    if ($uri === '/login_process' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new AuthController();
        $controller->login_process(); 
        exit;
    }

    if ($uri === '/register') {
        $controller = new AuthController();
        $controller->register(); 
        exit;
    }

    if ($uri === '/register_process' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new AuthController();
        $controller->register_process(); 
        exit;
    }
}


http_response_code(404);
echo '404 Not Found';
exit;
