<?php
namespace App;
use App\Repositories\Specifications;
use App\Specification;
/*Almacena la informacion en la sesion*/
/*  Metodos publicos [add,has,get,find,total,getWithPrices,getOnlyIds]*/
class Cart{

	public function add($product, $amount = 1)
	{
		# Inicializar carrito si no hay productos.
		if($this->total() == 0){
			$this->clear();
		}
		# Si el producto ya esta en el carrito, agregarle la cantidad.
		if($this->has($product))
		 	return $this->justAddTheamountToProduct($product,$amount);
		# Si el producto aun no esta en el carrito, agregarlo.
		$this->addNew($product, $amount);
	}

	private function addNew($product,$amount=1)
	{
		# Obtener al acrrito.
		$cart = $this->get();
		# Agregar al carrito el produto.
		array_push($cart,['id'=>$product,'amount'=>$amount]);
		# Almacenar en la sesion el carrito.
		session(['cart' => $cart]);
	}
	/* Agregar la cantidad a un determinado producto. */
	private function justAddTheamountToProduct($product,$amount)
	{
		# Obtener el carrito.
		$cart = ($this->get());
		# Obtener al indicie del producto.
		$product_index = $this->getIndexOf($product);
		# Aumentar al producto la cantidad.
		$actual_amount = $cart[$product_index]['amount'];
		$amount = $actual_amount + $amount;
		# Agregar el producto.
		$cart[$product_index] = ['id'=>$product,'amount'=>$amount];
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
			if(isset($item['id']))
				if($item['id'] == $product){
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
			if(isset($item['id']))
				if($item['id'] == $product){
					return $index;
				}
		}
		return false;
	}
	/* Borra todos los articulos del carrito. */
	public function clear()
	{
		session(['cart' => []]);
	}
	/* Borrar del carrito el producto. */
	public function remove($product)
	{
		$cart = $this->get();
		$product_index = $this->getIndexOf($product);
		$cart[$product_index] = [];
		session(['cart' => $cart]);
	}
	/* Obtener el carrito */
	public function get()
	{
		return session('cart');
	}
	/* Obtener el carrito de los id's. */
	public function getOnlyIds()
	{
		$cart = $this->get();
		$ids = [];
		if (is_array($cart)) {
			foreach($cart as $item){
				if(isset($item['id']))
					array_push($ids,$item['id']);
			}
		}
		return $ids;
	}
	/* Obtener el total de productos en el carrito. */
	public function total(){

		return sizeof($this->get());
	}
	public function getWithPrices()
	{
		$specifications = new Specifications(new Specification());
		$specifications = $specifications->getIn(
            $this->getOnlyIds()
        );
        foreach($specifications as $specification)
        {
        	if($aux = $this->find($specification->id))
        	{
        		$specification->amount = $aux['amount'];
        	}
        }
        return $specifications;
	}
}
?>
