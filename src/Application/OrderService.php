<?php

namespace Application;

use Domain\Order;
use Domain\OrderRepositoryInterface;

/**
 * Servicio para gestionar pedidos.
 */
class OrderService {
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder(string $description, float $total): bool {
        $order = new Order($description, $total);
        return $this->orderRepository->save($order);
    }

    public function getAllOrders(): array {
        return $this->orderRepository->findAll();
    }
}
