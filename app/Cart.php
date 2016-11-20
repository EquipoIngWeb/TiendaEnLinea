<?php
	namespace App;

	class Cart{

		public function add($product)
		{
			if($this->total() == 0){
				session(['cart' => []]);
			}

			if($this->has($product))
			 	return $this->justAddOneToProduct($product);
			
			$this->addNew($product);
		}
		public function addNew($product,$quantity=1)
		{
			$cart = $this->get();
			array_push($cart,['product'=>$product,'quantity'=>$quantity]);
			session(['cart' => $cart]);
		}

		public function justAddOneToProduct($product)
		{
			$cart = ($this->get());
			$product_index = $this->getIndexOf($product);
			$quantity = $this->getQuantityOf($product_index) + 1;
			$this->deleteIndex($product_index);
			$this->addNew($product,$quantity);
		}
		public function deleteIndex($product_index){
			$cart = ($this->get());
			unset($cart[$product_index]);
			session(['cart' => $cart]);
		}
		public function getQuantityOf($product_index){
			$cart = $this->get();
			$quantity = $cart[$product_index]['quantity'];
			return $quantity;
		}
		public function has($product)
		{
			if($this->find($product) == false)
				return false;
			return true;
		}
		public function getIndexOf($product)
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
		
		public function get()
		{
			return session('cart');
		}
		public function total(){

			return sizeof($this->get());
		}
	}
?>