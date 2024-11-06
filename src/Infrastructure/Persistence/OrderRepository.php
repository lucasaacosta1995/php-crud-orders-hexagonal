<?php

namespace Infrastructure\Persistence;

use Domain\Order;
use Domain\OrderRepositoryInterface;
use PDO;

/**
 * Repositorio de pedidos que implementa la persistencia en MySQL.
 */
class OrderRepository implements OrderRepositoryInterface {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function save(Order $order): bool {
        $query = "INSERT INTO orders (description, total) VALUES (:description, :total)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':description', $order->description);
        $stmt->bindParam(':total', $order->total);

        return $stmt->execute();
    }

    public function findAll(): array {
        $query = "SELECT * FROM orders";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
