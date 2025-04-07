<?php
    require_once __DIR__ . '/../config.php';

    class DatabaseConnection {
        private ?\PDO $database = null;

        public function getConnection(): PDO { //Initialise la connection avec la base de donnée en utilisant les variables contenues dans le fichier config.php / HORS COURS
            if ($this->database === null) {
                $host = DB_HOST;
                $dbname = DB_NAME;
                $username = DB_USER;
                $password = DB_PASSWORD;
                $charset = DB_CHARSET;

                $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];

                try {
                    $this->database = new PDO($dsn, $username, $password, $options);
                } catch (PDOException $e) {
                    exit('Erreur de connexion à la base de données : ' . $e->getMessage());
                }
            }
            return $this->database;
        }
    }