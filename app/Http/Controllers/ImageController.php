<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$root='images/';
    	if ($request->has('directory')) {
	    	$root = $request->directory.'/';
    	}
    	$directories = Storage::disk('local')->directories($root);
    	$images_array = Storage::disk('local')->files($root);
		$images = collect([]);
 		foreach ($images_array as $index => $image) {
			$images->put($index,['name'=> str_replace([$root,'.png','.jpg'],["",'',''], $image),'url'=> $image]);
 		}
 		return view('admin.image.index',compact('directories','images','root'));
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
        //
    }
    public function changeName(Request $request)
    {
    	$images_array = Storage::disk('local')->files($request->root);
		foreach ($images_array as $image) {
			if (strpos($image, $request->name)) {
        		return redirect()->back()->with('message','Ya hay una imagen con ese nombre! cambie nombre de imagen y vuelva a intentar');
			}
		}
    	$info = pathinfo($request->image);
    	Storage::move($request->image, $request->root.$request->name.".".$info['extension']);
        //Storage::disk('local')->delete($request->image);
        return redirect()->back()->with('message','Imagen default  seleccionada!');
    }
    public function setDefault(Request $request)
    {
    	$images_array = Storage::disk('local')->files($request->root);
		foreach ($images_array as $image) {
			if (strpos($image, 'default')) {
        		return redirect()->back()->with('message','Ya hay una imagen por default!');
			}
		}
    	$info = pathinfo($request->image);
    	Storage::move($request->image, $request->root."default.".$info['extension']);
        //Storage::disk('local')->delete($request->image);
        return redirect()->back()->with('message','Imagen default  seleccionada!');
    }
    public function upload(Request $request)
    {
    	foreach ($request->images as $image) {
		   $name = $image->getClientOriginalName();
	       Storage::disk('local')->put($request->root.'/'.$name,  \File::get($image));
    	}
        return redirect()->back()->with('message','Imagen(es) Agregada(s) correctamente!');
    }
	public function delete(Request $request)
    {
        Storage::disk('local')->delete($request->image);
        return redirect()->back()->with('message','Imagen Borrada correctamente!');
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
