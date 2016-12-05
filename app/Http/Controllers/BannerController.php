<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use App\Repositories\Banners;
class BannerController extends Controller
{
    function __construct(Banners $banners)
    {
        $this->banners = $banners;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->banners->getAll();
        return view('admin.banner.index',compact('banners'));
    }

    public function store(BannerRequest $request)
    {
        $this->banners->save($request->all());
        return redirect()->back()->with('message','Banner Registrado correctamente');
    }

    public function edit($id)
    {
        $banner = $this->banners->findOrFail($id);
        return view('admin.banner.edit',compact('banner'));
    }
    public function update(BannerRequest $request, $id){
        if($this->banners->update($id,$request->all())){
            return redirect('admin/banners')->with('message','Banner Actualizado correctamente');
        }
        return redirect('admin/banners')->with('message','Banner no pudo ser actualizado');
    }

    public function destroy($id)
    {
        if($this->banners->remove($id)){
            return redirect()->back()->with('message','Banner Borrado correctamente');
        }
        return redirect()->back()->with('message','Banner no pudo ser borrado');
    }
}
