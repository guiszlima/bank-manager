<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Container Principal -->
    <div class="flex h-screen">
        
        <!-- Menu Lateral -->
        <div class="w-64 bg-blue-600 text-white p-6 flex flex-col">
            <h2 class="text-2xl font-bold mb-8">Dashboard</h2>
            <ul>
                <li>
                    <a href="/dashboard" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">início</a>
                </li>
                <li>
                    <a href="/estudante" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize ">alunos</a>
                </li>
                <li>
                    <a href="/cursos" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize ">cursos</a>
                </li>
                <li>
                    <a href="/matricula" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">matrícula</a>
                </li>
            </ul>
            <div class="mt-auto">
                <a href="/logout" class="block py-2 px-4 bg-red-500 hover:bg-red-600 rounded mt-4 text-center">Sair</a>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-4 capitalize">Bem-vindo, <?php echo htmlspecialchars($user['name']); ?>!</h1>

            <p class="text-lg mb-8">Este é seu dashboard. Aqui você pode ver suas informações e acessar o CRUD de alunos.</p>

            <!-- Card de Informações do Usuário -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4">Informações do Usuário</h2>
                <p class="capitalize"><strong>Nome:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <form action="/criar-estudante/store" method="POST">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold mb-2">Nome</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg" required>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label for="birthday" class="block text-sm font-semibold mb-2">Data de Nascimento</label>
                    <input type="date" id="birthday" name="birthday" class="w-full p-3 border border-gray-300 rounded-lg" required>
                </div>

                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 mb-2 rounded-lg hover:bg-blue-700 transition duration-300">Enviar</button>
            </form>
            </div>

        </div>
    </div>

</body>

</html>
