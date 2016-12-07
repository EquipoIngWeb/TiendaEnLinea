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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = \Auth::user();
        $myShoppings = $this->sales->getOfUser($user->id);
        return view('user.profile',compact('user','myShoppings'));
    }
    public function ticket($sale_id)
    {
        $user = \Auth::user();
        $sale = $this->sales->find($sale_id);
        if($sale->user_id != $user->id)
            return redirect()->back()->with('message','Ha ocurrido un error :(');
        $ticket = $this->lineSales->ticket($sale_id);
        return view('product.ticket',compact('ticket','user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = \Auth::user();
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = \Auth::user();
        if ($this->users->update($user->id,$request->all())) {
            return redirect('user/profile')->with('message','Se ha actualizado su perfil!');
        }
        return redirect('user/edit')->with('message','No se a podido actualizar su información!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		 $this->users->remove($id);
		 return redirect()->back()->with('message','Se ha eliminado el usuario!');
    }
}
