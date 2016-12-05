<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Cart;

class CartTest extends TestCase
{

    public function testAddingToCart()
    {
        $cart = new Cart();
        # Agregando al carrito.
        $cart->add(1,100);
        $cart->add(1,20);
        $cart->add(2,20);

        # Verificar que se agreguen correctamente.
        $this->assertEquals(
            120,
            $cart->find(1)['amount']
        );

        # Solo se deben de agregar 2 debido a que se esta agregando dos veces el mismo.
        $this->assertEquals(2,$cart->total());
    }
}
