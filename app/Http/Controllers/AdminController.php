<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users;
class AdminController extends Controller
{
	protected $users;
	function __construct(Users $users)
	{
		$this->users = $users;
	}
    public function index()
    {
    	return view('admin.home');
    }
    public function users()
    {
    	$users= $this->users->getUsers();
    	return view('admin.user.index',compact('users'));
    }
}

