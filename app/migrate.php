<?php

// $pdo = new PDO('mysql:host=db;port=3306;dbname=app_db', 'user', 'secret');

// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// foreach (glob('migrations/*.php') as $file) {
//     $migration = require $file;

//     if (is_callable($migration)) {
//         echo "Executando: $file\n";
//         $migration($pdo);
//     } else {
//         echo "⚠️ Arquivo $file não retornou uma função.\n";
//     }
// }