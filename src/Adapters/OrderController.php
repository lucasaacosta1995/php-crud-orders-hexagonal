<?php

namespace Adapters;

use Application\OrderService;
use Infrastructure\Persistence\OrderRepository;
use Infrastructure\config\Database;

/**
 * Controlador para gestionar pedidos.
 */
class OrderController {
    private OrderService $orderService;

    public function __construct() {
        $db = (new Database())->getConnection();
        $orderRepository = new OrderRepository($db);
        $this->orderService = new OrderService($orderRepository);
    }

    public function createOrder(string $description, float $total): string {
        if ($this->orderService->createOrder($description, $total)) {
            return json_encode(['message' => 'Order created successfully']);
        }
        return json_encode(['message' => 'Failed to create order']);
    }

    public function listOrders(): string {
        return json_encode($this->orderService->getAllOrders());
    }
}
