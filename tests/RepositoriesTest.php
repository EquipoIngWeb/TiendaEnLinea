<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Repositories\Brands;
use App\Brand;

use App\Repositories\Comments;
use App\Comment;
use App\Product;
//ToDo: Test genderRepo.
class RepositoriesTest extends TestCase
{
	use DatabaseTransactions;

	protected $brands,$comments;
	function __construct()
	{
		$this->brands = new Brands(new Brand());
		$this->comments = new Comments(new Comment());
	}

	public function testBrands()
	{
		$brand = Brand::first();
		# Asegura que el metodo getByName regrese un brand.
		$this->assertEquals(
			$this->brands->getByName($brand->name),
			$brand,
			'Metodo getByName en repo brands no funciona :('
		);
	}

	public function testComments()
	{
		$product = Product::first();
		$this->createComments();

		# Cargar comentarios aprobados de una publicacion.
		$this->assertEquals(
			$this->comments->getAprovedOfProduct($product->id),
			Comment::where('status',1)->where('product_id',$product->id)->with('user')->get(),
			'Metodo getAprovedOfProduct en repo comments no funciona :('
		);

		# Cargar comentarios por aprobar de una publicacion.
		$this->assertEquals(
			$this->comments->getSend(),
			Comment::where('status',0)->with('user')->with('product')->get(),
			'Metodo getSend en repo comments no funciona :('
		);
	}



	private function createComments()
	{
		$comments = factory(App\Comment::class,3)->make();
		foreach($comments as $comment)
		{
			$comment->save();
		}
	}
}
