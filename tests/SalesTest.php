<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Cart;
use App\User;
use App\Repositories\Products;
use App\Product;
use App\Specification;

class SalesTest extends TestCase
{
	protected $authUser;
/*
	public function testAddingToCart()
	{
		# Obtener el carrito.
		$cart = new Cart();

		$fakeData = $this->getSomeProduct(200);
		# Agregar un producto al carrito.
		$this->asSomeAuthUser()->post('/user/sale/addToCart',$fakeData);


		$this->assertEquals(
			1,
			$cart->total(),
			'No se a agregado el producto :('
		);
	}

*/

	private function getSomeProduct($amount = 1)
	{
		$specification = Specification::get()->first();
		return ['specification_id' => $specification->id,'amount'=>$amount];
	}
	private function asSomeAuthUser()
	{
		$authUser = User::find(3);
		return $this->actingAs($authUser);
	}
}
