<?php

namespace Infrastructure\config;

use PDO;
use PDOException;

/**
 * Clase para configurar y obtener la conexión a la base de datos.
 */
class Database {
    private string $host = 'localhost'; // Cambiar por tu host de base de datos
    private string $dbName = 'order_management'; // Nombre de la base de datos
    private string $username = 'root'; // Tu usuario de base de datos
    private string $password = ''; // Tu contraseña de base de datos

    private PDO $conn;

    /**
     * Constructor de la clase.
     */
    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName}",
                $this->username,
                $this->password
            );
            // Establecer el modo de error de PDO para excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Captura la excepción si la conexión falla
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * Obtiene la instancia de la conexión PDO.
     * 
     * @return PDO La instancia de conexión.
     */
    public function getConnection(): PDO {
        return $this->conn;
    }
}
