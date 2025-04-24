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

            <p class="text-lg mb-8">Este é seu dashboard. Aqui você pode ver os alunos.</p>

            <!-- Card de Informações do Usuário -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4">Informações do Usuário</h2>
                <p class="capitalize"><strong>Nome:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <a href="/criar-estudante">
        <button class="bg-blue-500 text-white font-semibold py-2 px-4 mb-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Criar Aluno
        </button>
    </a>
    <form method="GET" action="/estudante" class="flex items-center space-x-4 mb-4">
    <input type="text" name="search" placeholder="Pesquisar por nome ou e-mail..." class="border px-4 py-2 rounded-lg w-1/3" value="<?php echo htmlspecialchars($searchQuery ?? ''); ?>">
    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Pesquisar</button>
</form>
            <!-- Tabela de Alunos -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4">Lista de Alunos</h2>

                <!-- Tabela de Alunos -->
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Nome</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemplo de lista de alunos -->
                        <?php foreach ($students as $student): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($student['nome']); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($student['email']); ?></td>
                            <td class="py-2 px-4 border-b">
                                <a href="/estudante/edit/<?php echo $student['id']; ?>" class="text-blue-600 hover:text-blue-800">Editar</a>
                                |
                                <a href="/student/delete/<?php echo $student['id']; ?>" class="text-red-600 hover:text-red-800"
                                onclick="return confirm('Deseja realmente excluir este aluno?');"
                                >Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
