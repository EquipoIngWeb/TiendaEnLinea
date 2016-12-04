<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Sales;
use App\Repositories\Specifications;
use App\Repositories\LineSales;
use App\Repositories\Inventories;
class SaleController extends Controller
{
	protected $sales;
	protected $line_sales;
	protected $specifications;
	protected $inventories;
	function __construct(Sales $sales , LineSales $line_sales,Specifications $specifications,Inventories $inventories)
	{
		$this->sales = $sales;
		$this->line_sales = $line_sales;
		$this->specifications = $specifications;
		$this->inventories = $inventories;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$sales = $this->sales->getAll();
		return view('admin.sale.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$line_sale = $request->all();
 		$user_id = \Auth::user()->id;
		$specification = $this->specifications->find($request->specification_id);
    	$line_sale['price'] = $specification->price;
		\DB::beginTransaction();
		$inventory = $this->inventories->getBySpecification($specification->id);
		if ($inventory->amount >= $line_sale['amount']) {
	    	$sale = $this->sales->save(['user_id'=>$user_id]);
	    	$line_sale['sale_id'] = $sale->id;
			$this->line_sales->save($line_sale);
			$inventory->amount = $inventory->amount - $line_sale['amount'];
			$inventory->save();
			\DB::commit();
		}else{
			\DB::rollBack();
    		return redirect()->back()->with('message','Articulos Insificientes');
		}
    	return redirect()->back()->with('message','Articulo Pedido a la tienda. Espere su respuesta');
    }

    public function addToCart()
    {
        return redirect()->back()->with('message','Articulo Pedido a la tienda. Espere su respuesta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
