<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso</title>
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
                <li><a href="/dashboard" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">início</a></li>
                <li><a href="/estudante" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">alunos</a></li>
                <li><a href="/cursos" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">cursos</a></li>
                <li><a href="/matricula" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">matrícula</a></li>
            </ul>
            <div class="mt-auto">
                <a href="/logout" class="block py-2 px-4 bg-red-500 hover:bg-red-600 rounded mt-4 text-center">Sair</a>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6 capitalize">Criar novo curso</h1>

            <!-- Formulário de Criação de Curso -->
            <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-xl">
                <form action="/curso/store" method="POST">
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-semibold mb-2">Nome do Curso</label>
                        <input type="text" id="nome" name="nome" class="w-full p-3 border border-gray-300 rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="descricao" class="block text-sm font-semibold mb-2">Descrição</label>
                        <textarea id="descricao" name="descricao" rows="4" class="w-full p-3 border border-gray-300 rounded-lg" required></textarea>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Salvar Curso</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
