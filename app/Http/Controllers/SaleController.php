<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Sales;
use App\Repositories\Specifications;
use App\Repositories\LineSales;
use App\Repositories\Inventories;
use App\Cart;
class SaleController extends Controller
{
	protected $sales;
	protected $line_sales;
	protected $specifications;
    protected $inventories;
    protected $cart;
	function __construct(Sales $sales , LineSales $line_sales,Specifications $specifications,Inventories $inventories,Cart $cart)
	{
		$this->sales = $sales;
		$this->line_sales = $line_sales;
		$this->specifications = $specifications;
        $this->inventories = $inventories;
		$this->cart = $cart;
	}
    public function index()
    {
		$sales = $this->sales->getAll();
		return view('admin.sale.index',compact('sales'));
    }
     public function ticket($sale_id)
     {
        $sale = $this->sales->find($sale_id);
        $user = $sale->user;
        $ticket = $this->line_sales->ticket($sale_id);
        return view('product.ticket',compact('sale','ticket','user'));
    }
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
    	return redirect()->back()->with('message','Articulos Pedido a la tienda. Espere su respuesta');
    }

    public function addToCart(Request $request)
    {
        if(!$request->specification_id){
            return redirect()->back()->with('message','No se selecciono ningun articulo');
        }
        $specification = $this->specifications->find($request->specification_id);
        $inventory = $this->inventories->getBySpecification($specification->id);
        if ($inventory->amount < $request->amount) {
            return redirect()->back()->with('message','No hay existencia suficiente');

        }
        $this->cart->add(
            $specification->id,
            $request->amount
        );
        return redirect()->back()->with('message','Articulo agregado al carrito');
    }
    public function removeFromCart($specification_id)
    {
        $this->cart->remove($specification_id);
        return redirect()->back()->with('message','Producto removido del carrito');
    }
    public function viewCart()
    {
        $size = sizeof(\Session::get('cart'));
        if ($size == 0) {
            return redirect()->back()->with('message','No hay ningun articulo en el carrito!');
        }
       $cart = $this->cart->getWithPrices();
       return view('product.shoppingCart',compact('cart'));
    }

    public function sendEmail()
    {
        $user = \Auth::user();
        $validator = \Validator::make($user->toArray(), [
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'postal_code' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('user/profile/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user->confirmation_code = str_random(30);
        $user->save();
        $cart = $this->cart->getWithPrices();

       // return view('email.confirmationCart',compact('cart','user'));
        \Mail::send('email.confirmationCart', compact('user','cart') , function($message) use ($user) {
            $message->to($user->email, $user->full_name)
                ->subject('Confirmación de compra de Lara-Shop');
        });
        return redirect('/')->with('message','Se ha enviado un correo de confirmacion, revisa tu correo.');
    }
    public function buyAllFromCart($confirmation_code)
    {
        $cart = $this->cart->getWithPrices();
        $user_id = \Auth::user()->id;
        $user = \Auth::user();
        if($confirmation_code!= $user['confirmation_code'])
            return redirect('user/cart')->with('message','Codigo de confirmacion incorrecto');
        $user['confirmation_code'] = '';
        $user->save();
        \DB::beginTransaction();
        $sale = $this->sales->save(['user_id'=>$user_id]);
        foreach ($cart as $item) {
            $inventory = $this->inventories->getBySpecification($item->id);
            if ($inventory->amount >= $item->amount) {
                $line_sale = [
                    'sale_id'=>$sale->id,
                    'specification_id'=>$item->id,
                    'price'=>$item->price,
                    'amount'=>$item->amount,
                ];
                $this->line_sales->save($line_sale);
                $inventory->amount = $inventory->amount - $line_sale['amount'];
                $inventory->save();
            }else{
                \DB::rollBack();
                return redirect('user/cart')->with('message','Articulos Insificientes');
            }
       }
       \DB::commit();
       $this->cart->clear();
        return redirect('/')->with('message','Su compra ha sido realizada :)');
    }
    // public function payWithPaypal(Request $request){
    //     if ($request->type== 'paypal') {
    //         return redirect($this->donations->savePaypal($request->all()));
    //     }
    //     $charge = $this->donations->saveConekta($request->all());
    //     if ($charge['status'] === 0)
    //         return redirect()->back()->with('message',$charge['message']);
    //     return redirect("user/donations/$request->type/".$charge['id_donation']);
    // }
    // public function paypalSuccess(Request $request)
    // {
    //     $payment = $this->sales->paypalSuccess($request->token);
    //     $project = $this->sales->getByToken($request->token)->project;
    //     $status = 1;
    //     return view('user.ticket.paypal',compact('payment','project','status'));
    // }
    // public function paypalConfirm(Request $request)
    // {
    //     $response = $this->sales->paypalConfirm($request->except('_token'));
    //     return view('user.ticket.success',compact('response'));
    // }
}
