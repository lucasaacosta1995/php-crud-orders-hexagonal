<?php

use PHPUnit\Framework\TestCase;
use Infrastructure\Persistence\OrderRepository;
use Domain\Order;
use Infrastructure\config\Database;

class OrderRepositoryTest extends TestCase
{
    private $orderRepository;
    private $db;

    protected function setUp(): void
    {
        // Configuramos una conexión mock a la base de datos
        $this->db = $this->createMock(Database::class);
        $this->orderRepository = new OrderRepository($this->db);
    }

    public function testGetAllOrders()
    {
        // Creamos una lista de pedidos simulada
        $orders = [
            new Order(1, 'Pedido 1', 150.00),
            new Order(2, 'Pedido 2', 200.00),
        ];

        // Definir el comportamiento del mock para que devuelva los pedidos simulados
        $this->db->method('query')
            ->willReturn($orders);  // Simula el resultado de una consulta a la base de datos

        // Llamamos al método para obtener todos los pedidos
        $result = $this->orderRepository->getAllOrders();

        // Verificamos que el resultado no sea vacío y que contenga los pedidos esperados
        $this->assertCount(2, $result);
        $this->assertEquals('Pedido 1', $result[0]->getDescription());
        $this->assertEquals('Pedido 2', $result[1]->getDescription());
    }
}
