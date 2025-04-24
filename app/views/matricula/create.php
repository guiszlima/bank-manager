<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Matrícula</title>
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
                    <a href="/matricula" class="block py-2 px-4 hover:bg-blue-700 rounded capitalize">Matrícula</a>
                </li>
            </ul>
            <div class="mt-auto">
                <a href="/logout" class="block py-2 px-4 bg-red-500 hover:bg-red-600 rounded mt-4 text-center">Sair</a>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-4 capitalize">Criar Matrícula</h1>

            <p class="text-lg mb-8">Preencha o formulário abaixo para criar uma nova matrícula.</p>

            <!-- Formulário de Criação -->
            <form action="/matricula/store" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
                <div class="mb-4">
                    <label for="student_id" class="block text-sm font-semibold">Aluno</label>
                    <select name="student_id" id="student_id" class="w-full p-2 border rounded">
                        <?php foreach ($students as $student): ?>
                            <option value="<?php echo $student['id']; ?>"><?php echo $student['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="course_id" class="block text-sm font-semibold">Curso</label>
                    <select name="course_id" id="course_id" class="w-full p-2 border rounded">
                        <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course['id']; ?>"><?php echo $course['title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                        Criar Matrícula
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
