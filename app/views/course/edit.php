<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
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
                    <a href="/estudante" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">alunos</a>
                </li>
                <li>
                    <a href="/cursos" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">cursos</a>
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
            <h1 class="text-3xl font-bold mb-4 capitalize">Editar Curso</h1>

            <p class="text-lg mb-8">Atualize as informações do curso abaixo.</p>

            <!-- Card de Informações do Usuário -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4">Informações do Usuário</h2>
                <p class="capitalize"><strong>Nome:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            </div>

            <!-- Formulário de Edição de Curso -->
            <form action="/cursos/update" method="POST" class="space-y-4">
                <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nome do Curso</label>
                    <input type="text" name="nome" value="<?php echo htmlspecialchars($curso['title']); ?>" class="w-full p-2 border rounded" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Descrição</label>
                    <textarea name="descricao" class="w-full p-2 border rounded" rows="4" required><?php echo htmlspecialchars($curso['descricao']); ?></textarea>
                </div>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Salvar Alterações</button>
            </form>
        </div>
    </div>

</body>

</html>
