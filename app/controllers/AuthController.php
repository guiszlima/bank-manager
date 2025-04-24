<?php
require "models/User.php";
class AuthController
{
    public function index()
    {
        
        require __DIR__ . '/../views/auth/login.php';

    }


    public function login_process()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
    
            try {
                
                $userModel = new User();
                $user = $userModel->findByEmail($email);
    
                if ($user && password_verify($password, $user['password'])) {
                    
                    $_SESSION['user'] = $user;
                    
                    // Redireciona para a dashboard após login bem-sucedido
                    header("Location: /dashboard");
                    exit;
                } else {
                    // Redireciona para a tela de login com erro
                    header("Location: /?error=Credenciais inválidas");
                    exit;
                }
            } catch (PDOException $e) {
                // Em caso de erro no banco de dados, redireciona com erro
                header("Location: /?error=Algo de errado aconteceu");
                exit;
            }
        } else {
            echo "Método não permitido.";
        }
    }

    public function register(){

        require __DIR__ . '/../views/auth/register.php';

    }

    public function register_process()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
    
            try {
                
                $userModel = new User();
    
                $existingUser = $userModel->findByEmail($email);
    
                if ($existingUser) {
                    header("Location: /register?error=Email já cadastrado");
                    exit;
                }
    
                if ($userModel->create($name, $email, $password)) {
                    header("Location: /login?success=1");
                    exit;
                } else {
                    header("Location: /register?error=Erro ao criar usuário");
                    exit;
                }
            } catch (PDOException $e) {
                header("Location: /register?error=Erro no banco de dados");
                exit;
            }
        } else {
            echo "Método não permitido.";
        }
    }

    public function logout()
    {
        
    
        // Remover apenas o usuário da sessão (opcional)
        unset($_SESSION['user']);
    
        // Destrói a sessão por completo
        session_unset(); 
        session_destroy();
    
        // Redireciona para login ou home
        header("Location: /");
        exit;
    }
    
}
