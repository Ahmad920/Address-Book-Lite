<?php
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return 
[
    "DB" => ["host" => $_ENV['DB_HOST'],
             "name" => $_ENV['DB_NAME'],
             "user" => $_ENV['DB_USER'],
             "password" => $_ENV['DB_PASSWORD']
            ],

    "app" => ["uri" => $_ENV['APP_URL']],
];