<?php

use PHPUnit\Framework\TestCase;
use Application\OrderService;
use Infrastructure\Persistence\OrderRepository;
use Domain\Order;

class OrderServiceTest extends TestCase
{
    private $orderService;
    private $mockRepository;

    protected function setUp(): void
    {
        // Creamos un mock del repositorio
        $this->mockRepository = $this->createMock(OrderRepository::class);
        
        // Instanciamos el servicio de órdenes, inyectando el mock del repositorio
        $this->orderService = new OrderService($this->mockRepository);
    }

    public function testCreateOrderSuccess()
    {
        // Datos de entrada para el pedido
        $description = 'Nuevo pedido de prueba';
        $total = 100.50;

        // Definir el comportamiento del mock para cuando se llame a saveOrder
        $this->mockRepository->expects($this->once())
            ->method('saveOrder')
            ->with($this->isInstanceOf(Order::class))
            ->willReturn(true);  // Simulamos que el pedido se guarda correctamente

        // Llamamos al método de servicio
        $result = $this->orderService->createOrder($description, $total);

        // Verificamos que la respuesta sea verdadera (pedido creado con éxito)
        $this->assertTrue($result);
    }

    public function testCreateOrderFailure()
    {
        // Datos de entrada para el pedido
        $description = 'Pedido con error';
        $total = 0;  // Monto inválido para simular un fallo

        // Definir el comportamiento del mock para que falle al guardar el pedido
        $this->mockRepository->expects($this->once())
            ->method('saveOrder')
            ->willReturn(false);  // Simulamos que el pedido no se guarda

        // Llamamos al método de servicio
        $result = $this->orderService->createOrder($description, $total);

        // Verificamos que la respuesta sea falsa (falló la creación del pedido)
        $this->assertFalse($result);
    }
}
