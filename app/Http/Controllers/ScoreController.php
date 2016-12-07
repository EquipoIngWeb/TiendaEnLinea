<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Scores;

class ScoreController extends Controller
{
	protected $scores;
	function __construct(Scores $scores)
	{
		$this->scores = $scores;
	}
    public function index()
    {
    	$scores = $this->scores->getAll();
    	return view('admin.score.index',compact('scores'));
    }
    public function score($product_id='',$score)
    {
        $user_id = \Auth::user()->id;
        if ($this->scores->hasScore($user_id)) {
            return redirect()->back()->with('message','No puede calificar el producto 2 veces o mas');
        }
        $this->scores->save(compact('user_id','product_id','score'));
        return redirect()->back()->with('message','Gracias por calificar nuestros producto');
    }
}
