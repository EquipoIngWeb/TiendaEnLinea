<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\Users;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $users;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Users $users)
    {
    	$this->users = $users;
        $this->middleware('guest');
    }

    public function store(UserRequest $user)
    {
		$user = $user->all();
		$user['confirmation_code'] = str_random(30);
        $user = $this->users->save($user);

		\Mail::send('email.confirmation', compact('user') , function($message) use ($user) {
            $message->to($user->email, $user->full_name)
                ->subject('Confirmación de cuenta de Lara-Shop');
        });
        return redirect()->back()->with('message','Gracias por Registrase! Favor de checar su correo.');
    }

    public function confirm($code='')
    {
        $user = $this->users->getByCodeConfirmation($code);
        if ( ! $user)
        {
        	return redirect('/')->with('message','Codigo de confirmación invalido');
        }
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        return redirect('/')->with('message','Listo para comenzar a comprar');
    }
}
