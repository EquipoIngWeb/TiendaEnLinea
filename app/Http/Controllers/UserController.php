<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users;
use App\Repositories\Sales;
use App\Repositories\LineSales;
class UserController extends Controller
{
    protected $sales;
	function __construct(Users $users,Sales $sales,LineSales $lineSales)
	{
		$this->users = $users;
        $this->sales = $sales;
        $this->lineSales = $lineSales;
	}
    public function profile($username='')
    {
        $user = $this->users->getByUsername($username);
        return view('web.profile',compact('user'));
    }

    public function myProfile()
    {
        $user = \Auth::user();
        return view('user.profile',compact('user'));
    }

    public function show()
    {
        $user = \Auth::user();
        $myShoppings = $this->sales->getOfUser($user->id);
        return view('user.main',compact('user','myShoppings'));
    }

    public function ticket($sale_id)
    {
        $user = \Auth::user();
        $sale = $this->sales->find($sale_id);
        if($sale->user_id != $user->id)
            return redirect()->back()->with('message','Ha ocurrido un error :(');
        $ticket = $this->lineSales->ticket($sale_id);
        return view('product.ticket',compact('sale','ticket','user'));
    }

    public function edit()
    {
        $user = \Auth::user();
        return view('user.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $user = \Auth::user();
        if ($this->users->update($user->id,$request->all())) {
            return redirect('user/profile')->with('message','Se ha actualizado su perfil!');
        }
        return redirect('user/edit')->with('message','No se a podido actualizar su información!');
    }

    public function destroy($id)
    {
		 $this->users->remove($id);
		 return redirect()->back()->with('message','Se ha eliminado el usuario!');
    }
}
