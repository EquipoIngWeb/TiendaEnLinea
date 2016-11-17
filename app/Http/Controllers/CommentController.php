<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Comments;

class CommentController extends Controller
{
	protected $comments;
	function __construct(Comments $comments)
	{
		$this->comments = $comments;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$comments = $this->comments->getDisaproved();
    	return view('admin.comment.index',compact('comments'));
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
    public function aproved($id='')
    {
    	$this->comments->update($id,['status',1]);
    	return redirect()->back()->with('message','Commentario Aprovado');
    }
    public function desaproved($id='')
    {
    	$this->comments->update($id,['status',2]);
    	return redirect()->back()->with('message','Commentario Desaprovado');
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
