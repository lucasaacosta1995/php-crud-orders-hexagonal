<?php

namespace Domain;

/**
 * Interfaz para el repositorio de pedidos.
 */
interface OrderRepositoryInterface {
    public function save(Order $order): bool;
    public function findAll(): array;
}
