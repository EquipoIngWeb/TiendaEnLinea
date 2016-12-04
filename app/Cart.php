<?php
namespace App;
/*Almacena la informacion en la sesion*/
/*  Metodos publicos [add,has,get,find,total]*/
class Cart{

	public function add($product, $quantity = 1)
	{
		# Inicializar carrito si no hay productos.
		if($this->total() == 0){
			session(['cart' => []]);
		}
		# Si el producto ya esta en el carrito, agregarle la cantidad.
		if($this->has($product))
		 	return $this->justAddTheamountToProduct($product,$quantity);
		# Si el producto aun no esta en el carrito, agregarlo.
		$this->addNew($product, $quantity);
	}

	private function addNew($product,$quantity=1)
	{
		# Obtener al acrrito.
		$cart = $this->get();
		# Agregar al carrito el produto.
		array_push($cart,['product'=>$product,'quantity'=>$quantity]);
		# Almacenar en la sesion el carrito.
		session(['cart' => $cart]);
	}
	/* Agregar la cantidad a un determinado producto. */
	private function justAddTheamountToProduct($product,$quantity)
	{
		# Obtener el carrito.
		$cart = ($this->get());
		# Obtener al indicie del producto.
		$product_index = $this->getIndexOf($product);
		# Aumentar al producto la cantidad.
		$actual_quantity = $cart[$product_index]['quantity'];
		$quantity = $actual_quantity + $quantity;
		# Agregar el producto.
		$cart[$product_index] = ['product'=>$product,'quantity'=>$quantity];
		# Almacenar el producto.
		session(['cart' => $cart]);


	}
	/* ¿ Tiene el producto ? */
	public function has($product)
	{
		if($this->find($product) == false)
			return false;
		return true;
	}
	/* Encontrar el producto. */
	public function find($product)
	{
		$cart = $this->get();
		if(!$cart)return false;

		foreach($cart as $item){
			if($item['product'] == $product){
				return $item;
			}
		}
		return false;
	}
	/* Obtener el indice del producto en el carrito. */
	private function getIndexOf($product)
	{
		$cart = $this->get();
		if(!$cart)return false;

		foreach($cart as $index => $item){
			if($item['product'] == $product){
				return $index;
			}
		}
		return false;
	}
	/* Obtener el carrito */
	public function get()
	{
		return session('cart');
	}
	/* Obtener el total de productos en el carrito. */
	public function total(){

		return sizeof($this->get());
	}
}
?>
