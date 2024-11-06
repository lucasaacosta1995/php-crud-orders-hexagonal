<?php

namespace Domain;

/**
 * Entidad Order que representa un pedido.
 */
class Order {
    public int $id;
    public string $description;
    public float $total;

    public function __construct(string $description, float $total) {
        $this->description = $description;
        $this->total = $total;
    }
}
