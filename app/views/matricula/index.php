<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrículas - Dashboard</title>
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
                    <a href="/dashboard" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">Início</a>
                </li>
                <li>
                    <a href="/estudante" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">Alunos</a>
                </li>
                <li>
                    <a href="/cursos" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">Cursos</a>
                </li>
                <li>
                    <a href="/matricula" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">Matrículas</a>
                </li>
            </ul>
            <div class="mt-auto">
                <a href="/logout" class="block py-2 px-4 bg-red-500 hover:bg-red-600 rounded mt-4 text-center">Sair</a>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-4 capitalize">Matrículas</h1>

            <p class="text-lg mb-8">Gerencie as matrículas dos alunos nos cursos.</p>

            <!-- Botão para Criar Matrícula -->
            <div class="mb-6">
                <a href="/matricula/criar">
                    <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                        Criar Matrícula
                    </button>
                </a>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
    <form method="GET" action="/matricula">
        <label for="busca_nome" class="block text-gray-700 text-sm font-bold mb-2">Buscar por nome do curso:</label>
        <div class="flex items-center gap-2">
            <input
                type="text"
                name="busca_nome"
                id="busca_nome"
                value="<?= isset($_GET['busca_nome']) ? htmlspecialchars($_GET['busca_nome']) : '' ?>"
                class="border border-gray-300 rounded-lg px-4 py-2 w-full"
                placeholder="Digite o nome do curso"
            >
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Buscar
            </button>
        </div>
    </form>
</div>

            <!-- Tabela de Matrículas -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4">Matrículas Cadastradas</h2>

                <!-- Tabela -->
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">ID</th>
                            <th class="px-4 py-2 border-b">Nome</th>
                           
                           
                            <th class="px-4 py-2 border-b">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($course['id']); ?></td>
                                <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($course['title']); ?></td>
                                
                                
                                <td class="px-4 py-2 border-b">
                                    
                                    <a href="/matricula/ver/<?php echo $course['id']; ?>"  class="text-blue-500 hover:underline">Ver</a> 

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
