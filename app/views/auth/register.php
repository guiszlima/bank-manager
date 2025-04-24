<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registrar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">




    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
 
        <h2 class="text-2xl font-semibold text-center mb-6">Registrar</h2>
        
  <img src="/public/finnet.jpg" alt="Registrar" class="rounded-xl shadow-lg hover:opacity-80 transition-opacity duration-300 w-['250'] ml-auto mb-2" >

        <?php
            if (isset($_GET['error'])) {
                echo '<div class="bg-red-500 text-white p-3 rounded-md text-center mb-4">' . htmlspecialchars($_GET['error']) . '</div>';
            }

            if (isset($_GET['success'])) {
                echo '<div class="bg-green-500 text-white p-3 rounded-md text-center mb-4">Cadastro realizado com sucesso!</div>';
            }
        ?>

        <form action="/register_process" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md">Registrar</button>
        </form>
        <div class="mt-4 text-center">
  <a href="/" class="text-blue-500 hover:underline">
    Já possui uma conta? Faça login
  </a>
    </div>

</body>
</html>