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
            <div class="mb-6">
        <form method="GET" action="/matricula/ver/<?php echo $courseId; ?>" class="flex items-center space-x-4">
            <input type="text" name="search" placeholder="Pesquisar por nome do aluno..." class="border px-4 py-2 rounded-lg w-1/3" value="<?php echo htmlspecialchars($searchQuery ?? ''); ?>">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Pesquisar</button>
        </form>
    </div>
            <!-- Tabela de Matrículas -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4">Matrículas do Curso</h2>

                   <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b text-left">Aluno</th>
                            <th class="px-4 py-2 border-b text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matriculas as $matricula): ?>
                            
                        

                            <tr>
                                <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($matricula['student_name']); ?></td>
                                <td class="px-4 py-2 border-b">
                                    <a href="/matricula/delete/<?php echo $matricula['matricula_id']; ?>" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Deletar</a>
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
